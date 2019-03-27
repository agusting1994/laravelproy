@extends('layouts/alumno')

@section('content')
<!-- Button trigger modal -->
<div class="row">
    @foreach ($materias as $materia)
    <h1>
        {{ $materia->nombre }}
    </h1>
    {{-- expr --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Subestacion A
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">
                            Special title treatment
                        </h4>
                        <p class="card-text">
                            With supporting text below as a natural lead-in to additional content.
                        </p>
                        <p class="card-text">
                            With supporting text below as a natural lead-in to additional content.
                        </p>
                        <a class="btn btn-primary" href="#">
                            Go somewhere
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        Ultima actualización: Hace 2 minutos
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Subestacion B
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">
                            Special title treatment
                        </h4>
                        <p class="card-text">
                            With supporting text below as a natural lead-in to additional content.
                        </p>
                        <a class="btn btn-primary" href="#">
                            Go somewhere
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        Ultima actualización: Hace 2 minutos
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Subestacion C
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">
                            Special title treatment
                        </h4>
                        <p class="card-text">
                            With supporting text below as a natural lead-in to additional content.
                        </p>
                        <a class="btn btn-primary" href="#">
                            Go somewhere
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        Ultima actualización: Hace 2 minutos
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Subestacion D
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">
                            Special title treatment
                        </h4>
                        <p class="card-text">
                            With supporting text below as a natural lead-in to additional content.
                        </p>
                        <a class="btn btn-primary" href="#">
                            Go somewhere
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        Ultima actualización: Hace 2 minutos
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.col -->
<!-- /.col -->
@endforeach
<!-- Modal -->
@endsection
