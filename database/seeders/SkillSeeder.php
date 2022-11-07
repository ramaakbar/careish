<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Skill::create([
            'skill' => 'menyapu'
        ]);

        Skill::create([
            'skill' => 'mengepel'
        ]);

        Skill::create([
            'skill' => 'memasak'
        ]);

        Skill::create([
            'skill' => 'mengasuh'
        ]);

        Skill::create([
            'skill' => 'mencuci baju'
        ]);

        Skill::create([
            'skill' => 'mencuci piring'
        ]);
    }
}
