<?php


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
        // Création des Villes
        $cities = City::factory(10)->create();

        // Création des Secteurs
        $secteurs = Secteur::factory(5)->create();

        // Création des Compétences
        $skills = Skill::factory(20)->create();

        // Création des Rôles et Permissions
        $adminRole = Role::factory()->create(['name' => 'Admin']);
        $userRole = Role::factory()->create(['name' => 'Candidate']);
        $recruterRole = Role::factory()->create(['name' => 'Recruiter']);
        $representerRole = Role::factory()->create(['name' => 'Representer']);
        $permissions = Permission::factory(5)->create();
        $adminRole->permissions()->attach($permissions->pluck('id'));
        $recruterRole->permissions()->attach($permissions->pluck('id'));
        $representerRole->permissions()->attach($permissions->pluck('id'));

        // Création des Utilisateurs et attribution de rôles et compétences
        $users = User::factory(10)->create();
        $users->each(function ($user) use ($userRole, $skills) {
            $user->roles()->attach($userRole);
            $user->skills()->attach($skills->random(3)->pluck('id'));
        });

        // Création des Entreprises et des Offres d'Emploi
        $companies = Company::factory(5)->create([
            'city_id' => $cities->random()->id
        ]);

        $companies->each(function ($company) use ($secteurs, $users) {
            // Création d'un représentant pour chaque entreprise
            $representer = User::factory()->create();
            CompanyRepresenter::factory()->create([
                'company_id' => $company->id,
                'user_id' => $representer->id
            ]);

            // Création d'offres d'emploi pour chaque entreprise
            JobOffer::factory(3)->create([
                'company_id' => $company->id,
                'secteur_id' => $secteurs->random()->id
            ]);
        });

        // Création des Formations pour les utilisateurs
        $formations = Formation::factory(10)->create();

        // Pour chaque utilisateur, attachez des formations aléatoirement
        // Pour chaque utilisateur, attachez des formations aléatoirement
$users->each(function ($user) use ($formations) {
    $formationIds = $formations->random(rand(1, 3))->pluck('id')->unique();
    foreach ($formationIds as $formationId) {
        if (!$user->formations()->where('formation_id', $formationId)->exists()) {
            $user->formations()->attach($formationId);
        }
    }
});

// Optionnellement, vous pouvez aussi parcourir les formations et leur attacher des utilisateurs aléatoirement
$formations->each(function ($formation) use ($users) {
    $userIds = $users->random(rand(1, 3))->pluck('id')->unique();
    foreach ($userIds as $userId) {
        if (!$formation->users()->where('user_id', $userId)->exists()) {
            $formation->users()->attach($userId);
        }
    }
});

}
}



// $this->call([
//             UserSeeder::class,
//             RoleSeeder::class,
//             RoleUserSeeder::class,
//             PermissionSeeder::class,
//             PermissionRoleSeeder::class
//         ]);