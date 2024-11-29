<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Task::factory(12)->create();
        User::factory()->create([
            'name' => 'Dan',
            'email' => 'dan@dan',
            'password' => '12345678',
        ]);
    }
}
