<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ClassRoom;
use App\Models\Course;
use App\Models\Inventory;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Course::factory(25)->create();
        ClassRoom::factory(15)->create();
        Inventory::factory(7)->create();
        Teacher::factory(25)->create();
        Student::factory(25)->create();

         User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@gmail.com',
             'password' => Hash::make('password')
         ]);
    }
}
