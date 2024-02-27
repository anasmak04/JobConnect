<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run()
    {
        // Define the skills data
        $skills = [
            ['name' => 'PHP'],
            ['name' => 'JavaScript'],
            ['name' => 'HTML'],
            ['name' => 'CSS'],
            // Add more skills as needed
        ];

        // Insert the skills into the database
        Skill::insert($skills);
    }
}
