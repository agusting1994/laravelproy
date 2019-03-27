<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
        public function __construct()
        {
            $this->middleware('guest')->except('logout');
        }
        protected function sendLoginResponse(Request $request)
        {
        $request->session()->regenerate();
        $previous_session = Auth::User()->session_id;
        if ($previous_session) {
        \Session::getHandler()->destroy($previous_session);
        }

        Auth::user()->session_id = \Session::getId();
        Auth::user()->save();
        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }      
    public function login(Request $request){
        //se controla si coinciden la contraseña y el email
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            
            ])){
                $user = User::where('email', $request->email)->first();
                //se controla que el email este confirmado, si esta confirmado se redirecciona
                if ($user->email_confirmado==1){
                    switch ($user->id_rol) {
                        case 1:
                            return redirect(route('admin'));
                        case 2:
                            return redirect(route('docente'));
                        case 3:
                            return redirect(route('login'))->with('statusinhabilitado', 'Cuenta inhabilitada');
                        case 4:
                            return redirect(route('cursado'));
                        case 5:
                            return redirect(route('cursado'));
                        /*
                            return redirect(route('login'))->with('statusinhabilitado', 'Cuenta inhabilitada'); */
                    }
                }else{
                    //si el email no esta confirmado entonces se devuelve un mensaje de error y se impude el ingreso
                    return redirect(route('login'))->with('statuserror', 'Email no confirmado. Para activar la cuenta debes ir a tu correo electrónico');
                }
            }else{
                //de no coincidir los datos se muestra en pantalla que la contraseña es invalida
                return redirect(route('login'))->with('statuserror', 'Cuenta o contraseña incorrecta.');
            }
        }
}
