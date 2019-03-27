@extends('layouts/alumno')

@section('content')
<h1>Alumno</h1>
{{ Session::get('idmateria', 'no existe') }}
@endsection