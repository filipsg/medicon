@extends('admin.template')
@section('titulo','Usuarios')

@section('titulocontenido')
  <h1>Usuarios <small>Crear</small></h1>
@endsection

@section('contenido')
  <div class="container box box-success">
    @include('admin.secciones.errores')
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        {!!Form::open(['route'=>'usuarios.store','method'=>'post','files'=>'true'])!!}
          @include('admin.usuarios.form')
        {!! Form::close() !!}
        
      </div>
    </div>    
  </div>
@endsection
