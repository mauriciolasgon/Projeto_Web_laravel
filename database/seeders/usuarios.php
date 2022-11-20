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
            'name'=>"Secretaria",
            'email'=>"secretaria@gmail.com",
            'password'=> Hash::make('123456789'),
            'identificador'=>2,
            'CPF'=>NULL,
            'filmes'=>NULL,
            'cep'=>NULL,
            'rua'=>NULL,
            'cidade'=>NULL,
            'bairro'=>NULL,
            'estado'=>NULL,
            'cursos'=>NULL,
            'matriculas'=>NULL,
            'avatar'=>NULL,
            'medias'=>NULL,


        ]);

        DB::table('users')->insert([
            'name'=>"ADM",
            'email'=>"adm@gmail.com",
            'password'=> Hash::make('123456789'),
            'identificador'=>3,
            'CPF'=>NULL,
            'filmes'=>NULL,
            'cep'=>NULL,
            'rua'=>NULL,
            'cidade'=>NULL,
            'bairro'=>NULL,
            'estado'=>NULL,
            'cursos'=>NULL,
            'matriculas'=>NULL,
            'avatar'=>NULL,
            'medias'=>NULL,


        ]);
            //
    }
}
