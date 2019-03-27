<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = \App\Curso::all();
        return view('/admin/cursos/index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/cursos/nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fechaDesde = explode("/", $request->desde);
        $fechaHasta = explode("/", $request->hasta);
        $curso = new \App\Curso();
        $curso->nombre = $request->nombre;
        $curso->inicio=$fechaDesde[2]. '/' . $fechaDesde[1] . '/' . $fechaDesde[0];
        $curso->finalizacion =$fechaHasta[2]. '/' . $fechaHasta[1] . '/' . $fechaHasta[0];
        $curso->precio = $request->precio;
        $curso->descripcion = $request->descripcion;
        $curso->save();
        return Redirect::to('/admin/cursos');
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
    public function edit($id)
    {
        $curso = \App\Curso::find($id);
        return view('admin/cursos/editar', compact('curso'));
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
        $rules = [
        'nombre' => 'required|max:100',
        'desde'=>'required|date_format:d/m/Y|before:hasta',  
        'hasta'=>'required|date_format:d/m/Y',
        'descripcion' => 'required',
        'precio'=>'required|numeric'];
        

        $messages = [
            'desde.before' => 'La fecha de inicio debe ser mayor a la fecha de finalización del curso.',
            'desde.date_format'=>'La fecha de fin no corresponde al formato día/mes/año.',
            'desde.required'=>'La fecha de inicio es requerida',
            'descripcion.required'=>'La descripción del curso es requerida',
            'nombre.required' => 'El nombre de la universidad es requerido',
            'abreviatura.required' => 'La abreviatura es requerida'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return Redirect::to('/admin/cursos/editar/'.$id)->withErrors($validator);
        }else{
            $newDate = date("Y/m/d", strtotime($request->desde));
        $fechaDesde = explode("/", $request->desde);
        $fechaHasta = explode("/", $request->hasta);
        $curso = \App\Curso::find($id);
        $curso->nombre=$request->nombre;
        $curso->descripcion=$request->descripcion;
        $curso->inicio=$fechaDesde[2]. '/' . $fechaDesde[1] . '/' . $fechaDesde[0];
        $curso->finalizacion =$fechaHasta[2]. '/' . $fechaHasta[1] . '/' . $fechaHasta[0];;
        $curso->precio = $request->precio;
        $curso->save();
        $mensaje = $curso->nombre . ' ha sido modificada correctamente!';
        return Redirect::to('/admin/cursos')->with('message', $mensaje);

        }
        
    }

    public function abmMaterias($id)
    {
        $curso = \App\Curso::find($id);
        $materias = \App\Materia::All();
        return view('admin/cursos/abmmaterias', compact('curso', 'materias'));
    }

    public function guardarMaterias(Request $request)
    {
        $curso_materia = \App\Curso::find($request->curso_id)->materias()->get();
        $curso = \App\Curso::find($request->curso_id);
        if($request->arreglo_materias == null){
            foreach($curso_materia as $mat){
                $curso->materias()->detach($mat->id);
            }
        }else{
            $arregloMaterias = explode("-", $request->arreglo_materias);
            
            foreach($curso_materia as $mat){
            if(!in_array($mat->id, $arregloMaterias)){
                 $curso->materias()->detach($mat->id);
            }
        }
        foreach($arregloMaterias as $materia){
            if(!$curso->materias()->where('id', $materia)->exists()){
                $curso->materias()->attach($materia);
                }
            }

            }

        $materias = \App\Materia::All();
        $mensaje = 'Se han modificado las materias de ' . $curso->nombre;
        return Redirect::to('/admin/cursos')->with('message', $mensaje);
    }
        
        
        
        


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Curso = \App\Curso::find($id);
        $Curso->delete($id);
        return response()->json([
        'nombre' =>$Curso->nombre
         ]);
    }

    public function eliminados()
    {
        $cursos = \App\Curso::onlyTrashed()->get();
        return view('admin/cursos/eliminados', compact('cursos'));
    }
    public function restablecerEliminado($id)
    {
        \App\Curso::withTrashed()->find($id)->restore();
        $curso = \App\Curso::find($id);
        return response()->json([
        'nombre' => $curso->nombre
         ]);
    }
}
