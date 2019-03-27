<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
class MDUsuarioAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::check()){
        $usuario_actual = \Auth::user();
        if($usuario_actual->email_confirmado == 0){
            return redirect('confirmaremail');
        }
        if($usuario_actual->id_rol!=1){
            return redirect('accesodenegado');
        }
        return $next($request);
        }else{
        return redirect('/login');
        }
    }
}
