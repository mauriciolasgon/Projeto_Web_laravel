<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name"=>"Mauricio",
            'identificador'=>0,
            'RAP'=>22000829,
            'filmes'=>"Barbie;Jhon_Wick;Barbie2",
            'email'=>"mauricio@gmail.com",
            'password'=>Hash::make('1234'),
        ]);

        DB::table('users')->insert([
            "name"=>"Murilo",
            'identificador'=>0,
            'RAP'=>87654321,
            'filmes'=>"Barbie2;Baby_drive;Velozes_e_furiosos",
            'email'=>"murilo@gmail.com",
            'password'=>Hash::make('4321'),
        ]);
        
        DB::table('users')->insert([
            "name"=>"Gustavo",
            'identificador'=>0,
            'RAP'=>12365479,
            'filmes'=>"Tropa_de_elite;Barbie4;Baby_drive",
            'email'=>"gustavo@hotmail.com",   
            'password'=>Hash::make('0426'),
        ]);
        DB::table('users')->insert([
            "name"=>"André",
            'identificador'=>0,
            'RAP'=>54645213,
            'filmes'=>"Barbie3;Velozes_e_furiosos;Baby_drive",
            'email'=>"andre@gmail.com",
            'password'=>Hash::make('5678'),
        ]);
        DB::table('users')->insert([
            "name"=>"Xastre",
            'identificador'=>1,
            'RAP'=>12345678,
            'filmes'=>0,
            'email'=>"xastre@gmail.com",
            'password'=>Hash::make('senha'),
        ]);
        DB::table('users')->insert([
            "name"=>"Panain",
            'identificador'=>1,
            'RAP'=>153553,
            'filmes'=>0,
            'email'=>"panain@gmail.com",
            'password'=>Hash::make('1568'),
        ]);
        DB::table('users')->insert([
            "name"=>"Miro",
            'identificador'=>1,
            'RAP'=>45689,
            'filmes'=>0,
            'email'=>"miro@gmail.com",
            'password'=>Hash::make('5648'),
        ]);
        DB::table('users')->insert([
            "name"=>"Sérgio",
            'identificador'=>1,
            'RAP'=>326598,
            'filmes'=>0,
            'email'=>"segio@gmail.com",
            'password'=>Hash::make('59591'),
        ]);
        //
    }
}
