<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Validator;
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $users = \App\User::All();
        return view('admin/usuarios/index', compact('users'));
    }

    public function eliminados()
    {
        $users = \App\User::onlyTrashed()->get();
        return view('admin/usuarios/elimiados', compact('users'));
    }

    public function restablecerEliminado($id)
    {
        \App\User::withTrashed()->find($id)->restore();
        $user = \App\User::find($id);
        return response()->json([
        'nombre' => $user->nombre,
        'apellido' => $user->apellido,
        'email' => $user->email
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/usuarios/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $usuario = new \App\User();
        $data['nombre'] = $usuario->nombre = ucwords($request->nombre);
        $data['apellido'] =$usuario->apellido = ucwords($request->apellido);
        $data['email'] =$usuario->email = strtolower($request->email);
        $data['token'] = $usuario->token = str_random(100);
        $usuario->id_rol = $request->rol;
        $pass = str_random(10);
        $usuario->password = bcrypt($pass);
        $usuario->telefono = $request->telefono;
        $data['password'] = $pass;
        try {
            $usuario->save();
            Mail::send('mails.confirmation', ['data'=>$data], function($mail) use($data){
            $mail->subject('Confirma tu cuenta');
            $mail->to($data['email'], $data['nombre']);
        });
        } catch (Exception $e) {
            
        }
        
        return Redirect::to('admin/usuarios')->with('message', "El usuario " . $data['nombre'] ." " . $data['apellido'] . "fue registrado correctamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function userToEdit($id)
    {
        $user = \App\User::find($id);
        return view('admin/usuarios/editar', compact('user'));
    }
    
    public function profile(){
        return view('usuario/profile');
    }


    public function cambiarPassword(){
        return view('usuario/cambiarpassword');
    }

    public function cambiandoPassword($id, $nuevapass, $actualpass){
        $user = User::find($id);
        $message = "";
        $hashedPassword = $user->password;
        if (Hash::check($actualpass, $hashedPassword)) {
            if(Hash::check($nuevapass, $hashedPassword)){
                $message = "La nueva contraseña debe ser diferente a la actual";
            }else{
                $user->password = bcrypt($nuevapass);
                $user->save();
                $message = "Se ha modificado correctamente tu contraseña";
            }
            
        }else{
            $message = "La contraseña ingresada no coincide con tu contraseña actual";
        };
        return response()->json([
        'message' => $message
         ]);
    }
    public function updateProfile(Request $request){
        $rules = ['image' => 'required|image|max:1024*1024*1',];
        $messages = [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 1MB'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return Redirect::to('usuario/perfil')->withErrors($validator);
        }else{
            
            //se mueve la imagen subida por el usuario hacia la carpeta public/perfiles
            $name = str_random(30) . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('perfiles', $name);

            //se busca el enlace a la imagen actual y luego se borra la imagen de la carpeta
            $imagenActual = Auth::user()->perfiles;
            if($imagenActual!="perfiles/perfil.jpg"){
                 \File::delete($imagenActual);
            }

            //se actualiza en la base de datos la nueva ruta
            $user = new User();
            $user->where('email', '=', Auth::user()->email)
            ->update(['perfiles'=>'perfiles/'.$name]);
            return Redirect::to('usuario/perfil')->with('message', 'Tu imagen de perfil se ha modificado correctamente!');
    }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $request->validate([
            'nombre' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'email' => 'unique:users,email,'.$users->id,
            'password' => 'between:5,12',
            'rol' => 'required',
            'telefono' => 'digits_between:0,15|numeric',
        ]);

        $users->nombre = $request->nombre;
        $users->apellido = $request->apellido;
        $users->email = $request->email;
        $users->id_rol = $request->rol;
        $users->telefono = $request->telefono;
        $users->email_confirmado = $request->email_confirmado;
        $modificarContrasena = $request->input('modificar_contrasena');
        if($modificarContrasena == 0){
            //el check no está activo
        }else{
            //el check está activo
            $users->password = bcrypt($request->password);
        }
        $users->save();
        $mensaje = "Usuario " . $users->nombre . " " . $users->apellido . " modificado exitosamente";
        return Redirect::to('admin/usuarios')->with('message', $mensaje);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Users = \App\User::find($id);
        $Users->delete($id);
        return response()->json([
        'nombre' =>$Users->nombre,
        'apellido' => $Users->apellido
         ]);
    }

    public function reenviarCorreo(){
        
        $users = User::All();
        $users = DB::table('users')->where('email_confirmado', '0')
        ->where('deleted_at', null)
        ->get();
        return view('admin.usuarios.reenviarconfirmacion', compact('users'));
    }


    public function verBandejaEntrada(){
        return view('usuario.bandejadeentrada');
    }
    public function leerMensaje(){
        return view('usuario.mensajerecibido');
    }

    public function crearMensaje(){
        return view('usuario.crearmensaje');
    }

    public function reenviar($id){
        $user = \App\User::find($id);
        $data['nombre'] = $user->nombre;
        $data['apellido'] =$user->apellido;
        $data['email'] =$user->email;
        $data['token'] = $user->token = str_random(100);
        $pass = str_random(10);
        $user->password = bcrypt($pass);
        $user->telefono;
        $user->save();
        $data['password'] = $pass;
         Mail::send('mails.confirmation', ['data'=>$data], function($mail) use($data){
            $mail->subject('Confirma tu cuenta');
            $mail->to($data['email'], $data['nombre']);
        });
        if( count(Mail::failures()) > 0 ) {

           echo "There was one or more failures. They were: <br />";

        foreach(Mail::failures as $email_address) {
                   return Redirect::to('admin/usuarios/reenviar')->with('error', 'No se pudo reenviar el correo de activación.');;
                }

            } else {
            $mensaje = "El correo de activación a $user->email ha sido enviado correctamente!";
            return Redirect::to('admin/usuarios/reenviar')->with('message', $mensaje);;
            }
    }

    public function abmCursos($id)
    {
        $user = \App\User::find($id);
        $cursos = \App\Curso::All();
        return view('admin/usuarios/abmcursos', compact('user', 'cursos'));
    }
    public function guardarCursos(Request $request)
    {
        $curso_user = \App\User::find($request->user_id)->cursos()->get();
        $user = \App\User::find($request->user_id);
        if($request->arreglo_cursos == null){
            foreach($curso_user as $c_u){
                $user->cursos()->detach($c_u->id);
            }
        }else{
            $arregloCursos = explode("-", $request->arreglo_cursos);
            
            foreach($curso_user as $c_u){
            if(!in_array($c_u->id, $arregloCursos)){
                 $user->cursos()->detach($c_u->id);
            }
        }
        foreach($arregloCursos as $curso){
            if(!$user->cursos()->where('id', $curso)->exists()){
                $user->cursos()->attach($curso);
                }
            }

            }

        $mensaje = 'Se han modificado las materias de ' . $user->nombre;
        return Redirect::to('/admin/usuarios')->with('message', $mensaje);
    }
    public function abmMaterias($id)
    {
        $user = \App\User::find($id);
        if($user->id_rol==2){
            $cursos = \App\Materia::All();
            return view('admin/usuarios/abmmaterias', compact('user', 'cursos'));
        }else{
            $mensaje = 'El usuario ' . $user->nombre . ' no es un docente activo';
         return Redirect::to('/admin/usuarios')->with('message', $mensaje);
        }
        
    }
    public function guardarMaterias(Request $request)
    {
        $curso_user = \App\User::find($request->user_id)->materias()->get();
        $user = \App\User::find($request->user_id);
        if($request->arreglo_cursos == null){
            foreach($curso_user as $c_u){
                $user->materias()->detach($c_u->id);
            }
        }else{
            $arregloCursos = explode("-", $request->arreglo_cursos);
            
            foreach($curso_user as $c_u){
            if(!in_array($c_u->id, $arregloCursos)){
                 $user->materias()->detach($c_u->id);
            }
        }
        foreach($arregloCursos as $curso){
            if(!$user->materias()->where('id', $curso)->exists()){
                $user->materias()->attach($curso);
                }
            }

            }

        $mensaje = 'Se han modificado las materias de ' . $user->nombre;
        return Redirect::to('/admin/usuarios')->with('message', $mensaje);
    }
}
