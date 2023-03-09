<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisciplinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discipline::create([
            'name' => 'Программирование',
            'slug' => 'coding',
            'description' => 'блабалбала',
            'start_date' => '2022-10-12',
            'finish_date' => '2022-11-12',
            'teacher_id' => '1',
            'group_for' => '1'
        ]);
    }
}
