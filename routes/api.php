<?php

use App\Http\Controllers\api\Cities;
use App\Http\Controllers\api\Provinces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Instagram\Api;
use Instagram\Auth\Checkpoint\ImapClient;
use Instagram\Exception\InstagramException;
use Psr\Cache\CacheException;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/provinces', Provinces::class)->name('provinces');

Route::get('/cities/{provinces_id?}', [Cities::class, 'getCities'])->name('cities');

Route::get('/ig/{username}', function (string $username) {
    $cachePool = new FilesystemAdapter('Instagram', 0, __DIR__ . '/../storage/apicache');
    try {
        $api = new Api($cachePool);
        $imapClient = new ImapClient('imap.gmail.com:993', env('IMAP_LOGIN'), env('IMAP_PASSWORD'));
        $api->login(env('INSTAGRAM_EMAIL'), env('INSTAGRAM_PASSWORD'), $imapClient);
        $profile = $api->getProfile($username);
        $medias = array_slice($api->getMoreMedias($profile)->toArray()['medias'], 0, 6);

        foreach ($medias as &$media) {
            $media['thumbnailSrc'] = encodeimg($media['thumbnailSrc']);
        }

        return ['medias' => $medias];
    } catch (InstagramException $e) {
        return ['igerror' => $e->getMessage()];
    } catch (CacheException $e) {
        return ['cacheerror' => $e->getMessage()];
    }
});

function encodeimg($url)
{
    $r = get_headers($url, 1);
    if (isset($r['Content-Type'])) {
        $imageData = base64_encode(file_get_contents($url));
        $src = 'data: ' . $r['Content-Type'] . ';base64,' . $imageData;
    } else {
        $src = $url;
    }
    return $src;
}
