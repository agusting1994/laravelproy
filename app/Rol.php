<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table ="Roles";
    protected $fillable = ['nombre'];


    //un rol puede tener muchos usuarios, es decir que un usuario+++00
    public function user(){
    	return $this->hasMany('App\User');
    }

}
