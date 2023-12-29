<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Seeder
{

    use HasRoles;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Creating Admin User
        $admin = User::create([
            'name' => 'admin', 
            'email' => 'admin@test.com',
            'password' => Hash::make('admin')
        ]);
        $admin->assignRole('Admin');

        $editor = User::create([
            'name' => 'editor', 
            'email' => 'editor@test.com',
            'password' => Hash::make('editor')
        ]);
        $editor->assignRole('Admin');

        
    }
}
