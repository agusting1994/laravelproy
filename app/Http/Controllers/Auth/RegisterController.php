<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;
use Hash;
use Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nombre'=>$data['nombre'],
            'apellido'=>$data['apellido'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function register(Request $request){
        dd('ok');
        $input = $request->all();
        $validator = $this->validator($input);
        if ($validator->passes()) {
            $data = $this->create($input)->toArray();
            $data['token'] = str_random(25);
            $user = User::find($data['id']);
            $data['contrasena'] = $request->password;
            $user->token = $data['token'];
            $user->save();
            Mail::send('mails.confirmation', $data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('Activación de cuenta');
            });
            return redirect(route('register'))->with('status', 'El email de confirmaci. Please check your email');
        }
        return redirect(route('register'))->with('status', 'Ocurrió algún problema con el envío de la cuenta.');
    }

    private function passwordCorrect($suppliedPassword)
        {
         return Hash::check($suppliedPassword, Auth::user()->password, []);
        }

    public function confirmation($token){
        $user=User::where('token', $token)->first();
        if (!is_null($user)) {
            $user->email_confirmado = 1;
            $user->token = '';
            $user->save();
            return redirect(route('login'))->with('status', 'Se activo tu cuenta satisfactoriamente.');
        }
        return redirect(route('login'))->with('status', 'Ocurrió algun problema en la activación de tu cuenta');
    }
}
