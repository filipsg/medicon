@extends('admin.template')
@section('titulo','Proveedores')

@section('titulocontenido')
  <h1>Proveedores <small>Crear</small></h1>
@endsection

@section('contenido')
  <div class="container box box-success">
    @include('admin.secciones.errores')
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        {!!Form::open(['route'=>'proveedores.store','method'=>'post'])!!}
          @include('admin.proveedores.form')
        {!! Form::close() !!}
        
      </div>
    </div>    
  </div>
@endsection
