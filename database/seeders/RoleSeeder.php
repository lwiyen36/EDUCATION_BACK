<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ["nom_role" => "admin" ] ,
            ["nom_role" => "formateur"] ,
            ["nom_role" => "etudiant"]
        ] ;

        foreach($roles as $role) {
            Role::create($role) ;
        }
    }
}
