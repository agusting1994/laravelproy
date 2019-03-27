<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//ADMINISTRADOR
Route::group(['middleware' => 'usuarioadmin'], function(){
	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::get('/admin/usuarios', 'UsuariosController@index')->name('usuarios');
	Route::get('/admin/usuarios/registrar', 'UsuariosController@create')->name('registrarusuario');
	Route::post('/admin/usuarios', 'UsuariosController@store');
	Route::get('admin/usuarios/eliminados', 'UsuariosController@eliminados');
	Route::delete('/admin/user/delete/{id}', 'UsuariosController@destroy');
	Route::get('/admin/usuarios/reactivareliminado/{id}', 'UsuariosController@restablecerEliminado');
	Route::get('/admin/usuarios/ed/{id}', 'UsuariosController@edit');
	Route::get('/admin/usuarios/editar/{id}', 'UsuariosController@userToEdit');
	Route::get('/admin/usuarios/reenviar', 'UsuariosController@reenviarCorreo');
	Route::get('/admin/usuarios/reenviarcorreo/{id}', 'UsuariosController@reenviar');
	Route::put('/admin/usuarios/update/{id}', 'UsuariosController@update')->name('modificarusuario');
	Route::get('/admin/usuarios/abmcursos/{id}', 'UsuariosController@abmCursos');
	Route::post('/admin/usuarios/guardarcursos', 'UsuariosController@guardarCursos');
	Route::get('/admin/usuarios/abmmaterias/{id}', 'UsuariosController@abmMaterias');
	Route::post('/admin/usuarios/guardarmaterias', 'UsuariosController@guardarMaterias');
	
	//cursos
	Route::get('/admin/cursos', 'Admin\CursosController@index')->name('cursos');
	Route::get('/admin/cursos/nuevo', 'Admin\CursosController@create')->name('nuevocurso');
	Route::put('admin/universidades/modificarcurso/{id}', 'Admin\CursosController@update')->name('modificarcurso');
	Route::get('/admin/cursos/editar/{id}', 'Admin\CursosController@edit');
	Route::post('/admin/cursos', 'Admin\CursosController@store');
	Route::get('/admin/cursos/abmmaterias/{id}', 'Admin\CursosController@abmMaterias');
	Route::post('/admin/cursos/guardarcurso', 'Admin\CursosController@guardarMaterias');
	Route::delete('/admin/curso/delete/{id}', 'Admin\CursosController@destroy');
	Route::get('/admin/cursos/eliminados', 'Admin\CursosController@eliminados');
	Route::get('/admin/cursos/reactivarcursoeliminado/{id}', 'Admin\CursosController@restablecerEliminado');

	//Materias

	Route::get('/admin/materias', 'Admin\MateriasController@index');
	Route::get('/admin/materias/nueva', 'Admin\MateriasController@create')->name('nuevamateria');
	Route::post('/admin/materias', 'Admin\MateriasController@store');
	Route::get('/admin/materias/editar/{id}', 'Admin\MateriasController@edit');
	Route::put('admin/materias/modificarmateria/{id}', 'Admin\MateriasController@update')->name('modificarmateria');
	Route::delete('/admin/materia/delete/{id}', 'Admin\MateriasController@destroy');
	Route::get('/admin/materias/eliminadas', 'Admin\MateriasController@eliminadas');
	Route::get('/admin/materias/reactivarmateriaeliminada/{id}', 'Admin\MateriasController@restablecerEliminada');
	Route::get('/admin/materias/agregarmodulo/{id}', 'Admin\MateriasController@agregarModulo');




});
//DOCENTE
Route::group(['middleware' => 'usuariodocente'], function(){
	Route::get('/docente', 'DocenteController@index')->name('docente');
});

//ALUMNO
Route::group(['middleware' => 'usuarioalumno'], function(){
	Route::get('/cursado', 'CursadoController@index')->name('cursado');
	Route::get('/cursado/materias', 'CursadoController@getMaterias');
	Route::post('/cursado/cambiarmateria', 'CursadoController@cambiarMateria');
	//materias
	Route::get('/cursado/materia/{id}', 'CursadoController@verMateria');
	Route::get('/cursado/materia/video/{idmodulo}', 'CursadoController@verVideo');
	Route::get('/cursado/pruebaajax', 'CursadoController@pruebaAjax');
	Route::get('listar', 'CursadoController@pruebaAjaxListar');
	Route::get('buscarcontenido', 'CursadoController@buscarContenido');
	Route::get('terminar_autoevaluacion', 'CursadoController@terminarAutoevaluacion');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');


/*ERRORES*/
Route::get('/accesodenegado', function () {
    return view('errores/accesodenegado');
});
Route::get('/alumnoinhabilitado', function () {
    return view('errores/alumnoinhabilitado');
});

Route::get('/confirmaremail', function () {
    return view('errores/confirmaremail');
});

//*USUARIO GENERAL*
Route::get('usuario/perfil', 'UsuariosController@profile');
Route::get('usuario/correo', 'UsuariosController@verBandejaEntrada');
Route::get('usuario/correo/enviar', 'UsuariosController@crearMensaje');
Route::get('usuario/cambiarpassword', 'UsuariosController@cambiarPassword');
Route::post('usuario/actualizarperfil/', 'UsuariosController@updateProfile');
Route::put('admin/cambiarpassword/{id}/{nuevapass}/{actualpass}', 'UsuariosController@cambiandoPassword');