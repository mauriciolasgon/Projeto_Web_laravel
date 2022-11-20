<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'curso',
        'descriçao_simplificada',
        'descrição_completa',
        'alunos',
        'docentes',
        'aberto_fechado',
    ];
}
