<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materia extends Model
{
	
    use SoftDeletes;
    protected $table ="Materias";
    protected $fillable = ['nombre', 'acronimo'];
    
    public function cursos(){
        return $this->belongsToMany('App\Curso');
    }
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
