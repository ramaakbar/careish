<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        PostCategory::create([
            'category' => 'lorem'
        ]);

        PostCategory::create([
            'category' => 'ipsum'
        ]);

        PostCategory::create([
            'category' => 'dolor'
        ]);
    }
}
