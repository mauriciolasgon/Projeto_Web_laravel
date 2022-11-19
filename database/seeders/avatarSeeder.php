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
    }

}

