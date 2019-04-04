<?php

use Illuminate\Database\Seeder;

class admin extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'administrador',
            'email' => 'admin@laravelapi.com',
            'password' => Hash::make('da123456vi'),
            'remember_token' => 0
            ]);
        }
    }
    