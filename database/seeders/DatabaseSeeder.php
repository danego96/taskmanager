<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $user = User::factory(10)->create();
        $admin = User::factory()->create([
            'name' => 'Dan',
            'email' => 'dan@dan',
            'password' => '12345678',
        ]);

        Task::factory(12)->create();

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        $admin -> assignRole($roleAdmin);
        User::where('id', '!=', $admin->id)->get()->each(function ($user) use ($roleUser) {
            $user->assignRole($roleUser);
        });
    }
}
