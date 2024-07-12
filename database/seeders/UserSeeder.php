<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Sabih',
            'email' => 'Sabih1@gmail.com',
            'gender' => 'male',
            'phno' => '03435515668',
            'password' => '12345',
            'type'=> 0
        ]);
        User::create([
            'name' => 'Rehman',
            'email' => 'Rehman@gmail.com',
            'gender' => 'male',
            'phno' => '03455515668',
            'password' => '12345',
            'type'=> 1
        ]);

    }
}
