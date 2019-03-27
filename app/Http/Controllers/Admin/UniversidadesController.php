<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Universidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
class UniversidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universidades = \App\Universidad::All();
        return view('admin/universidades/index', compact('universidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/universidades/nueva');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['nombre' => 'required|between:0,100','abreviatura'=>'required|between:0,5'];
        $messages = [
            'nombre.required' => 'El nombre de la universidad es requerido',
            'nombre.between' => 'El nombre de la universidad debe contener hasta un máximo de 100 caracteres.',
            'abreviatura.required' => 'Solo se permite un máximo de 5 caracteres para la abreviatura',
            'abreviatura.between' => 'La abreviatura debe contener hasta un máximo de 5 caracteres.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return Redirect::to('/admin/universidades/nueva')->withErrors($validator);
        }else{
             $universidad = new Universidad();
             $universidad->nombre = $request->nombre;
             $universidad->abreviatura = $request->abreviatura;
             $universidad->save();
             return Redirect::to('/admin/universidades')->with('message', 'Se agregó correctamente:');
        }
        
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
        $universidad = \App\Universidad::find($id);
        return view('admin/universidades/editar', compact('universidad'));
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
        $rules = ['nombre' => 'required','abreviatura'=>'required'];
        $messages = [
            'nombre.required' => 'El nombre de la universidad es requerido',
            'abreviatura.required' => 'La abreviatura es requerida'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return Redirect::to('usuario/perfil')->withErrors($validator);
        }else{
            $universidad = \App\Universidad::find($id);
            $universidad->nombre = $request->nombre;
            $universidad->abreviatura = $request->abreviatura;
            $universidad->save();
            $mensaje = $universidad->nombre . ' ha sido modificada correctamente!';
        return Redirect::to('admin/universidades')->with('message', $mensaje);
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
        //
    }
}
