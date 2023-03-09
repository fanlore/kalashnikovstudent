<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Коля',
            'surname' => 'Калашников',
            'patronymic' => 'Викторович',
            'email' => 'fanlore@mail.ru',
            'password' => bcrypt('fanking2001'),
        ])->assignRole('Admin');
        User::create([
            'name' => 'Иван',
            'surname' => 'Ивановов',
            'patronymic' => 'Иванович',
            'email' => 'ivan@email.com',
            'password' => bcrypt('fanking2001'),
        ])->assignRole('Teacher');
        User::create([
            'name' => 'Михаил',
            'surname' => 'Золоторёв',
            'patronymic' => 'Александрович',
            'email' => 'mishka@email.com',
            'password' => bcrypt('fanking2001'),
        ])->assignRole('Student');

    }
}
