<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Validator;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $materias = \App\Materia::all();
        return view('/admin/materias/index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/materias/nueva');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materia = new \App\Materia();
        $materia->nombre = $request->nombre;
        $materia->acronimo = $request->acronimo;
        $materia->save();
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
        $materia = \App\Materia::find($id);
        return view('admin/materias/editar', compact('materia'));
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
        'acronimo'=>'required|max:10'];
        

        $messages = [
            'nombre.required'=>'El nombre de la materia es requerido',
            'acronimo.required' => 'El nombre de la universidad es requerido',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return Redirect::to('/admin/materias/editar/'.$id)->withErrors($validator);
        }else{
           
        $materia = \App\Materia::find($id);
        $materia->nombre=$request->nombre;
        $materia->acronimo=$request->acronimo;
        $materia->save();
        $mensaje = $materia->nombre . ' ha sido modificada correctamente!';
        return Redirect::to('/admin/materias')->with('message', $mensaje);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materia = \App\materia::find($id);
        $materia->delete($id);
        return response()->json([
        'nombre' =>$materia->nombre
         ]);
    }

    public function eliminadas()
    {
        $materias = \App\Materia::onlyTrashed()->get();
        return view('admin/materias/eliminadas', compact('materias'));
    }
    public function restablecerEliminada($id)
    {
        \App\Materia::withTrashed()->find($id)->restore();
        $materia = \App\Materia::find($id);
        return response()->json([
        'nombre' => $materia->nombre
         ]);
    }

    public function agregarModulo($id){
        $materia = \App\Materia::find($id);
        return view('admin/materias/agregarmodulos', compact('materia'));
    }
}
