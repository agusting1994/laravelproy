<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    public function tasks(){
        return $this->belongsToMany('\App\Task','menu_task_user')
            ->withPivot('menu_id','status');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'email', 'password', 'id_rol', 'token', 'telefono', 'perfiles'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['deleted_at'];


    public function roles(){
        return $this->belongsToMany('App\Rol');
    }
    public function cursos(){
        return $this->belongsToMany('App\Curso');
    }
    public function materias(){
        return $this->belongsToMany('App\Materia');
    }
}
