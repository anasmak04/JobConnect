<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            [
                'title' => 'user_access',
            ],
            [
                'title' => 'user_edit',
            ],
            [
                'title' => 'user_delete',
            ],
            [
                'title' => 'user_create',
            ],
        ];
        foreach ($permissions as $permission){
            Permission::create($permission);
        }
    }
}
