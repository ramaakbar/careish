<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Http\Request;

class Provinces extends Controller
{
    public function __invoke(Request $request): Collection
    {
        return Province::query()
            ->select('id', 'name')
            ->orderBy('id')
            ->when(
                $request->search,
                fn ($query) => $query
                    ->where('name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn ($query) => $query->whereIn('id', $request->input('selected', []))
            )
            ->get();
    }
}
