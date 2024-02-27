<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define the formations data
        $formations = [
            [
                'title' => 'Web Development Bootcamp',
                'description' => 'Intensive web development training program',
                'start_date' => '2023-01-15',
                'end_date' => '2023-03-15',
            ],
            [
                'title' => 'Data Science Course',
                'description' => 'Comprehensive course on data science concepts',
                'start_date' => '2023-02-20',
                'end_date' => '2023-05-20',
            ],

            [
                'title' => 'Mobile Developement',
                'description' => 'Comprehensive course on mobile developement',
                'start_date' => '2023-02-20',
                'end_date' => '2023-05-20',
            ],


            [
                'title' => 'Devops',
                'description' => 'Comprehensive course on Devops',
                'start_date' => '2023-02-20',
                'end_date' => '2023-05-20',
            ],

            [
                'title' => 'AI',
                'description' => 'Comprehensive course on AI',
                'start_date' => '2023-02-20',
                'end_date' => '2023-05-20',
            ],
        ];

        // Insert the formations into the database
        Formation::insert($formations);
    }
}
