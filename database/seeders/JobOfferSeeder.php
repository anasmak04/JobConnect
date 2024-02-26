<?php

namespace Database\Seeders;

use App\Models\JobOffer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define the number of job offers you want to create
        $numberOfJobOffers = 10;

        // Create job offers using factory
        JobOffer::factory($numberOfJobOffers)->create();
    }
}
