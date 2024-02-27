<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the sample company data
        $companies = [
            [
                'name' => 'Example Company 1',
                'description' => 'This is the description for Example Company 1.',
                // 'position' => 'CEO',
                'website' => 'https://example.com',
                'city_id' => 1, // Assuming you have a city with ID 1
            ],
            [
                'name' => 'Example Company 2',
                'description' => 'This is the description for Example Company 2.',
                // 'position' => 'CTO',
                'website' => 'https://example.com',
                'city_id' => 2, // Assuming you have a city with ID 2
            ],
            // Add more sample companies as needed
        ];

        // Insert the sample company data into the database
        foreach ($companies as $companyData) {
            Company::create($companyData);
        }
    }
}
