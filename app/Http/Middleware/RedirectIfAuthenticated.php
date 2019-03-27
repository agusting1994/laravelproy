<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $tipo_usuario = Auth::user()->id_rol;
            switch ($tipo_usuario) {
                        case 1:
                            return redirect(route('admin'));
                        case 2:
                            return redirect(route('docente'));
                        case 3:
                            return redirect(route('login'))->with('statusinhabilitado', 'Cuenta inhabilitada');
                        case 4:
                            return redirect(route('cursado'));
                        case 5:
                            return redirect(route('login'))->with('statusinhabilitado', 'Cuenta inhabilitada');
                    }
        }

        return $next($request);
    }
}
