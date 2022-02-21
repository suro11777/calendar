<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'Admin',
                'email' => 'admin@mail.ru',
                'password' => Hash::make('adminadmin'),
            ],
            [
                'id' => '2',
                'name' => 'Admin1',
                'email' => 'admin1@mail.ru',
                'password' => Hash::make(rand(11111111, 99999999)),
            ],
            [
                'id' => '3',
                'name' => 'Admin2',
                'email' => 'admin2@mail.ru',
                'password' => Hash::make(rand(11111111, 99999999)),
            ],
        ]);

    }

}
