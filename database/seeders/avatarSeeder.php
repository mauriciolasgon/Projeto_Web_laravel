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
            "cursoImagem"=>"img\avatarProf\c.png",

        ]);
        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\curso-hardware.jpg",

        ]);
        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\curso-python.jpg",

        ]);
        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\desenvolvimento-web.jpg",

        ]);
        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\avexcel.png",

        ]);
        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\internet-das-coisas-1.jpg",

        ]);

        DB::table('imagens')->insert([
            "cursoImagem"=>"img\avatarProf\games.jpg",

        ]);

    }

}

