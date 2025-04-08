<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder {
    public function run(): void {
        Role::insert([
            ['name' => 'admin', 'description' => 'Has full access to the system'],
            ['name' => 'user', 'description' => 'Regular user with limited access'],
            ['name' => 'HR', 'description' => 'Manages employee records and hiring'],
            ['name' => 'accountant', 'description' => 'Handles financial records and transactions'],
            ['name' => 'lawyer', 'description' => 'Provides legal support and compliance'],
            ['name' => 'intern', 'description' => 'Limited access, mostly for learning'],
        ]);
    }
}

