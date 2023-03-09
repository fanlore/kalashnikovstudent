<?php

namespace Database\Seeders;

use App\Models\Discipline;
use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            UsersTableSeeder::class,
            YearsTableSeeder::class,
            FacultiesTableSeeder::class,
            GroupsTableSeeder::class,
            DisciplinesTableSeeder::class,
            LessonsTableSeeder::class,
        ]);
    }
}
