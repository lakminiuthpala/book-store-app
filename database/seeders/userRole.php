<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class userRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create permissions for Manage Book
         Permission::create(['name' => 'list-books', 'guard_name' => 'staff']);
         Permission::create(['name' => 'create-books', 'guard_name' => 'staff']);
         Permission::create(['name' => 'view-books', 'guard_name' => 'staff']);
         Permission::create(['name' => 'edit-books', 'guard_name' => 'staff']);
         Permission::create(['name' => 'delete-books', 'guard_name' => 'staff']);
         Permission::create(['name' => 'assign-books', 'guard_name' => 'staff']);
         
         // Create permissions for Manage Employee
         Permission::create(['name' => 'create-staff', 'guard_name' => 'staff']);
         Permission::create(['name' => 'update-staff', 'guard_name' => 'staff']);

         // Create permission for Readers
         Permission::create(['name' => 'view-book', 'guard_name' => 'reader']);
         Permission::create(['name' => 'view-history', 'guard_name' => 'reader']);

         // Create roles and assign permissions for Employees
         $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'staff']);
         $adminRole->syncPermissions(['list-books','create-books','view-books', 'edit-books', 'delete-books', 'assign-books', 'create-staff', 'update-staff']);

         $editorRole = Role::create(['name' => 'editor', 'guard_name' => 'staff']);
         $editorRole->syncPermissions(['edit-books', 'assign-books']);
 
         $viewerRole = Role::create(['name' => 'viewer', 'guard_name' => 'staff']);
         $viewerRole->givePermissionTo('view-books');
 
         // Create role and assign permissions to readers
         $readerRole = Role::create(['name' => 'reader', 'guard_name' => 'reader']);
         $readerRole->givePermissionTo(['view-book','view-history']);
    }
}
