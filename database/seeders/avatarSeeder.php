<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Avatar;


class avatarSeeder extends Seeder
{
    public function run()
    {
        // avatar dos prof
        DB::table('avatars')->insert([
            "path"=>"img\avatarProf\avatar-4.jpg",

        ]);
        DB::table('avatars')->insert([
            "path"=>"img\avatarProf\avatar-cavalo.jpg",

        ]);
        DB::table('avatars')->insert([
            "path"=>"img\avatarProf\avatar-cs.jpg",

        ]);
        DB::table('avatars')->insert([
            "path"=>"img\avatarProf\avatar-onepuchman.jpg",

        ]);
        DB::table('avatars')->insert([
            "path"=>"img\avatarProf\avatar-rick.png",

        ]);
        DB::table('avatars')->insert([
            "path"=>"img\avatarProf\avatar-sapo.png",

        ]);
        DB::table('avatars')->insert([
            "path"=>"img\avatarProf\avatar-padrão.png",

        ]);
        // Imagem dos cursos

        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\curso-1.jpg",

        ]);
        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\curso-2.jpg",

        ]);
        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\curso-3.png",

        ]);
        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\curso-4.png",

        ]);
        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\curso-5.jpg",

        ]);
        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\curso-6.jpg",

        ]);
        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\curso-7.png",

        ]);

    }

}

