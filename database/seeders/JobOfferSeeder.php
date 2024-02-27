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
        JobOffer::create(["title"=> "Software Developer", "description" => "Develop cutting-edge software solutions.", "company_id" => "1", 'secteur_id' => "5", "location" => "New York", "type" => "Full-time", "salary" => "80000", "start_date" => "2024-03-01", "end_date" => "2024-03-04"]);
        JobOffer::create(["title"=> "Graphic Designer", "description" => "Create visually appealing designs.", "company_id" => "2", 'secteur_id' => "2", "location" => "San Francisco", "type" => "Contract", "salary" => "70000", "start_date" => "2024-04-01", "end_date" => "2025-03-31"]);
        JobOffer::create(["title"=> "Data Analyst", "description" => "Analyze and interpret complex datasets.", "company_id" => "1", 'secteur_id' => "2", "location" => "Chicago", "type" => "Full-time", "salary" => "85000", "start_date" => "2024-05-01", "end_date" => "2024-05-05"]);
        JobOffer::create(["title"=> "Project Manager", "description" => "Lead projects to successful completion.", "company_id" => "2", 'secteur_id' => "2", "location" => "Boston", "type" => "Full-time", "salary" => "95000", "start_date" => "2024-06-01", "end_date" => "2024-06-08"]);
        JobOffer::create(["title"=> "Digital Marketer", "description" => "Strategize and implement marketing campaigns.", "company_id" => "1", 'secteur_id' => "2", "location" => "Austin", "type" => "Part-time", "salary" => "60000", "start_date" => "2024-07-01", "end_date" => "2024-07-05"]);
        JobOffer::create(["title"=> "Content Writer", "description" => "Produce engaging content across mediums.", "company_id" => "2", 'secteur_id' => "2", "location" => "Seattle", "type" => "Freelance", "salary" => "50000", "start_date" => "2024-08-01", "end_date" => "2025-01-31"]);
        JobOffer::create(["title"=> "UI/UX Designer", "description" => "Design intuitive user interfaces.", "company_id" => "1", 'secteur_id' => "2", "location" => "Denver", "type" => "Full-time", "salary" => "77000", "start_date" => "2024-09-01", "end_date" => "2024-12-01"]);
        JobOffer::create(["title"=> "SEO Specialist", "description" => "Optimize websites for search engines.", "company_id" => "2", 'secteur_id' => "2", "location" => "Miami", "type" => "Contract", "salary" => "65000", "start_date" => "2024-10-01", "end_date" => "2025-09-30"]);
        JobOffer::create(["title"=> "Human Resources Manager", "description" => "Manage recruitment and employee relations.", "company_id" => "1", 'secteur_id' => "2", "location" => "Atlanta", "type" => "Full-time", "salary" => "90000", "start_date" => "2024-11-01", "end_date" => "2024-11-05"]);
        JobOffer::create(["title"=> "IT Support Specialist", "description" => "Provide technical support and troubleshooting.", "company_id" => "2", 'secteur_id' => "2", "location" => "Dallas", "type" => "Full-time", "salary" => "72000", "start_date" => "2024-12-01", "end_date" => "2024-12-02"]);

    }
}
