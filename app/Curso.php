<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{

    use SoftDeletes;
    protected $table ="Cursos";
    protected $fillable = ['nombre', 'id_universidad', 'inicio', 'finalizacion', 'precio', 'descripcion'];
    protected $dates = ['deleted_at'];  

    //un curso puede tener muchos usuarios
    //un curso pertenece a muchos alumnos
    public function cursos(){
    	return $this->belongToMany('App\User');
    }

    public function materias(){
        return $this->belongsToMany('App\Materia');
    }
    
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
