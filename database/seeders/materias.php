<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Materia;

class materias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('materias')->insert([
            "materias"=>"OSC",
            "alunos"=>"Mauricio;Murilo;Gustavo;André",
            "professores"=>"Panain",
        ]);

        DB::table('materias')->insert([
            "materias"=>"Projeto web",
            "alunos"=>"Mauricio;Murilo;Gustavo;André",
            "professores"=>"Xastre",
        ]);
        DB::table('materias')->insert([
            "materias"=>"Cálculo",
            "alunos"=>"Mauricio;Murilo;Gustavo;André",
            "professores"=>"Miro",
        ]);
        DB::table('materias')->insert([
            "materias"=>"Teologia",
            "alunos"=>"Mauricio;Murilo;Gustavo;André",
            "professores"=>"Anderson",
        ]);
        DB::table('materias')->insert([
            "materias"=>"Fundamentos ",
            "alunos"=>"Mauricio;Murilo;Gustavo;André",
            "professores"=>"Xastre",
        ]);
        DB::table('materias')->insert([
            "materias"=>"Robótica",
            "alunos"=>"Mauricio;Murilo;Gustavo;André",
            "professores"=>"Sérgio",
        ]);
    }
}
