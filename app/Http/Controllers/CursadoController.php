<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class CursadoController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        if (Session::get('idmateria') == null) {
            $materias = DB::select('select curso_id as id from curso_user cu where cu.user_id=48');
            Session::put('idmateria', reset($materias)->id);
        }
        $materias = DB::select('SELECT m.nombre as nombre, m.id as id
            FROM cursos c
            inner join curso_materia as cm on c.id= cm.curso_id
            inner join materias m on m.id = cm.materia_id
            inner join curso_user cu on cu.curso_id = c.id
            inner join users u on u.id = cu.user_id
            where cu.user_id=' . $id . ' and c.id=' . Session::get('idmateria') . '');
        Session::put('cart', $materias);

        return view('alumno/index');
    }
    public function pruebaAjax()
    {
        return view('alumno/pruebaajax');
    }
    public function pruebaAjaxListar()
    {
        $nombre = $_GET['apellido'];
        $users  = \App\User::all();
        return view('alumno/pruebaajaxlistar', compact('users', 'nombre'));
    }

    public function terminarAutoevaluacion()
    {
        $arrayN             = explode(',', $_GET['arrayprueba']);
        $arrayCorreccion    = array();
        $arrayJustificacion = array();
        $correctas          = 0;
        $interador          = 0;
        foreach ($arrayN as $item) {
            $arrayPR            = explode('-', $item);
            $pregunta_respuesta = DB::table('pregunta_respuesta')
                ->select('*')
                ->where([['pregunta_respuesta.pregunta_id', '=', $arrayPR[0]], ['pregunta_respuesta.respuesta', '=', $arrayPR[1]]])
                ->get();
            if ($pregunta_respuesta[0]->correcta) {
                $arrayCorreccion[$interador] = 'true';
                $correctas++;
            } else {
                $justificacion = DB::table('autoevaluacion_pregunta')
                    ->select('*')
                    ->where([['autoevaluacion_pregunta.pregunta_id', '=', $arrayPR[0]]])
                    ->first();
                $arrayJustificacion[$interador] = $justificacion->justificacion;
                $arrayCorreccion[$interador]    = 'false';
            }
            $interador++;
        }
        $porcentajeCorrectas = ($correctas * 100) / $interador;
        dd($arrayJustificacion);
        return response()->json(['arrayCorreccion' => $arrayCorreccion, "arrayJustificacion" => $arrayJustificacion, 'porcentajeCorrectas' => $porcentajeCorrectas]);

    }

    public function cambiarMateria(Request $request)
    {
        if ($_POST) {
            Session::put('idmateria', $request->idmateria);
        }
        return Redirect::to('cursado');
    }

    public function getMaterias(Request $request)
    {
        $id       = Auth::user()->id;
        $materias = DB::select('SELECT m.nombre as nombre
            FROM cursos c
            inner join curso_materia as cm on c.id= cm.curso_id
            inner join materias m on m.id = cm.materia_id
            inner join curso_user cu on cu.curso_id = c.id
            inner join users u on u.id = cu.user_id
            where cu.user_id=' . $id . ' and c.id=' . Session::get('idmateria') . '');
        return view('alumno/materias/materias', compact('materias'));
    }
    public function verMateria($id)
    {

        $id_user      = Auth::user()->id;
        $user_materia = DB::table('users')
            ->join('curso_user', 'users.id', '=', 'curso_user.user_id')
            ->join('curso_materia', 'curso_materia.curso_id', '=', 'curso_user.curso_id')
            ->join('materias', 'materias.id', '=', 'curso_materia.materia_id')
            ->where(
                [
                    ['curso_materia.curso_id', '=', Session::get('idmateria')],
                    ['users.id', '=', $id_user],
                    ['curso_materia.materia_id', '=', $id]])
            ->select('users.nombre', 'curso_user.curso_id', 'materias.nombre')
            ->get();
        $modulo_tema = DB::table('users')
            ->join('curso_user', 'users.id', '=', 'curso_user.user_id')
            ->join('curso_materia', 'curso_materia.curso_id', '=', 'curso_user.curso_id')
            ->join('materias', 'materias.id', '=', 'curso_materia.materia_id')
            ->join('materia_modulo', 'materia_modulo.materia_id', '=', 'materias.id')
            ->join('modulo_tema', 'modulo_tema.modulo_id', '=', 'materia_modulo.modulo_id')

            ->where(
                [
                    ['curso_materia.curso_id', '=', Session::get('idmateria')],
                    ['users.id', '=', $id_user],
                    ['curso_materia.materia_id', '=', $id]])
            ->select('curso_user.curso_id', 'materias.nombre', 'modulo_tema.nombre', 'modulo_tema.modulo_id', 'modulo_tema.tema_id')
            ->orderBy('modulo_tema.orden')
            ->get();
        //get contenido de temas
        $tema_contenido = DB::table('users')
            ->join('curso_user', 'users.id', '=', 'curso_user.user_id')
            ->join('curso_materia', 'curso_materia.curso_id', '=', 'curso_user.curso_id')
            ->join('materias', 'materias.id', '=', 'curso_materia.materia_id')
            ->join('materia_modulo', 'materia_modulo.materia_id', '=', 'materias.id')
            ->join('modulo_tema', 'modulo_tema.modulo_id', '=', 'materia_modulo.modulo_id')
            ->join('tema_contenido', 'tema_contenido.tema_id', '=', 'modulo_tema.tema_id')
            ->where(
                [
                    ['curso_materia.curso_id', '=', Session::get('idmateria')],
                    ['users.id', '=', $id_user],
                    ['curso_materia.materia_id', '=', $id]])
            ->select('tema_contenido.*')
            ->get();

        //get modulos
        $modulos = DB::table('users')
            ->join('curso_user', 'users.id', '=', 'curso_user.user_id')
            ->join('curso_materia', 'curso_materia.curso_id', '=', 'curso_user.curso_id')
            ->join('materias', 'materias.id', '=', 'curso_materia.materia_id')
            ->join('materia_modulo', 'materia_modulo.materia_id', '=', 'materias.id')
            ->where(
                [
                    ['curso_materia.curso_id', '=', Session::get('idmateria')],
                    ['users.id', '=', $id_user],
                    ['curso_materia.materia_id', '=', $id]])
            ->select('materia_modulo.nombre', 'materia_modulo.modulo_id')
            ->get();

        //controla si el usuario quiere acceder a una materia que no le corresponde
        if (!$user_materia->isEmpty()) {

            $materia = DB::table('materias')->where('id', $id)->first();
            $modulos = DB::table('materia_modulo')->where('materia_id', '=', $materia->id)->get();
            $modulos = DB::table('materia_modulo')->where('materia_id', '=', $materia->id)->get();
            return view('alumno/materias/contenidomateria', compact('materia', 'modulo_tema', 'modulos', 'tema_contenido'));
        } else {
            return Redirect::to('cursado');
        }

    }

    public function verVideo($id_tema)
    {
        $video = DB::table('tema_contenido')
            ->where('tema_id', '=', $id_tema)
            ->select('*')
            ->get();
        return view('alumno/materias/video', compact('video'));
    }

    public function buscarContenido()
    {

        switch ($_GET['tipo']) {
            case 'video':
                $temaid = $_GET['temaid'];
                $video  = DB::table('tema_contenido')
                    ->where('tema_id', $temaid)
                    ->select('*')
                    ->first();
                $modulo_id_orden = DB::table('modulo_tema')
                    ->where('tema_id', $temaid)
                    ->select('*')
                    ->first();
                $anterior_tema_id = db::table('modulo_tema')
                    ->where([
                        ['modulo_id', '=', $modulo_id_orden->modulo_id],
                        ['orden', '<', $modulo_id_orden->orden],
                    ])
                    ->select('tema_id')
                    ->orderBy('orden', 'desc')
                    ->first();
                if ($anterior_tema_id == null) {
                    $materia_id_orden = db::table('materia_modulo')
                        ->where('modulo_id', $modulo_id_orden->modulo_id)
                        ->select('materia_id', 'orden')
                        ->first();
                    $anterior_modulo = db::table('materia_modulo')
                        ->where([
                            ['materia_id', '=', $materia_id_orden->materia_id],
                            ['orden', '<', $materia_id_orden->orden],
                        ])
                        ->orderBy('orden', 'desc')
                        ->select('modulo_id', 'orden')
                        ->first();
                    if ($anterior_modulo != null) {
                        $anterior_modulo_tema = db::table('modulo_tema')
                            ->where('modulo_id', $anterior_modulo->modulo_id)
                            ->orderBy('orden', 'desc')
                            ->select('tema_id')
                            ->first();
                        return view('alumno/materias/vervideo', compact('video', 'anterior_modulo', 'anterior_modulo_tema'));
                    } else {
                        return view('alumno/materias/vervideo', compact('video', 'anterior_modulo'));
                    }

                } else {

                    return view('alumno/materias/vervideo', compact('video', 'anterior_tema_id'));
                }
                break;
            case 'lectura':
                $temaid = $_GET['temaid'];
                $titulo = DB::table('tema_contenido')
                    ->where('tema_id', $temaid)
                    ->select('nombre_lectura')
                    ->get();
                $lectura = DB::table('tema_contenido')
                    ->where('tema_id', $temaid)
                    ->select('*')
                    ->get();
                return view('alumno/materias/verlectura', compact('lectura', 'titulo'));
                break;
            case 'autoevaluacion':
                $autoevaluacionid = $_GET['autoevaluacion'];
                $autoevaluacion   = DB::table('autoevaluacion_pregunta')
                    ->where('autoevaluacion_id', $autoevaluacionid)
                    ->select('*')
                    ->get();
                $autoevaluacion_preguntas = DB::table('tema_contenido')
                    ->join('autoevaluacion', 'tema_contenido.autoevaluacion_id', '=', 'autoevaluacion.autoevaluacion_id')
                    ->join('autoevaluacion_pregunta', 'autoevaluacion.autoevaluacion_id', '=', 'autoevaluacion_pregunta.autoevaluacion_id')
                    ->join('pregunta_respuesta', 'autoevaluacion_pregunta.pregunta_id', '=', 'pregunta_respuesta.pregunta_id')
                    ->where('tema_contenido.tema_id', '5b70339776ae5')
                    ->select('pregunta_respuesta.*')
                    ->get();
                $modulo_id_orden = db::table('modulo_tema')
                    ->join('tema_contenido', 'modulo_tema.tema_id', '=', 'tema_contenido.tema_id')
                    ->where('tema_contenido.autoevaluacion_id', $autoevaluacionid)
                    ->select('modulo_id', 'orden')
                    ->first();
                $siguiente_tema_id = db::table('modulo_tema')
                    ->where([
                        ['modulo_id', '=', $modulo_id_orden->modulo_id],
                        ['orden', '>', $modulo_id_orden->orden],
                    ])
                    ->select('tema_id')
                    ->orderBy('orden')
                    ->first();

                if ($siguiente_tema_id == null) {
                    $materia_id_orden = db::table('materia_modulo')
                        ->where('modulo_id', $modulo_id_orden->modulo_id)
                        ->select('materia_id', 'orden')
                        ->first();
                    $siguiente_modulo = db::table('materia_modulo')
                        ->where([
                            ['materia_id', '=', $materia_id_orden->materia_id],
                            ['orden', '>', $materia_id_orden->orden],
                        ])
                        ->select('modulo_id', 'orden')
                        ->first();
                    $siguiente_modulo_tema = db::table('modulo_tema')
                        ->where('modulo_id', $siguiente_modulo->modulo_id)
                        ->orderBy('orden', 'asc')
                        ->select('tema_id')
                        ->first();
                }
                return view('alumno/materias/verautoevaluacion', compact('autoevaluacion', 'autoevaluacion_preguntas', 'siguiente_tema_id', 'siguiente_modulo', 'siguiente_modulo_tema'));
                break;
                break;
        }
        $tipo = $_GET['tipo'];

    }
}
