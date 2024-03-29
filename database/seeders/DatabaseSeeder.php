<?php


use Database\Seeders\CitySeeder;
use Database\Seeders\FormationSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\SecteurSeeder;
use Database\Seeders\SkillSeeder;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Company;
use App\Models\CompanyRepresenter;
use App\Models\JobOffer;
use App\Models\Secteur;
use App\Models\City;
use App\Models\Skill;
use App\Models\Formation;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CitySeeder::class,
            RoleSeeder::class,
            SecteurSeeder::class,
            FormationSeeder::class,
            SkillSeeder::class,
        ]);

    }

}
