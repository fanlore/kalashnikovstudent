<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::create([
            'title' => 'Урок 1',
            'content' => 'lorem ipsum',
            'homework_media' => 'storage/media/homework.pdf',
            'destination' => 'lection',
            'discipline_id' => '1',
            'is_available' => true,
            'order_number' => '1',
        ]);
    }
}
