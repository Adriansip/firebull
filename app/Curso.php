<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
  protected $table = 'cursos';

  protected $fillable = ['curso','norma'];

  protected $primaryKey = 'idCurso';  
}
