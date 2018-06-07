@extends('admin.template')
@section('titulo','Productos')

@section('titulocontenido')
	<h1>Productos <small>Editar</small></h1>
@endsection

@section('contenido')
	<div class="container box box-success">
		@include('admin.secciones.errores')
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				{!!Form::model($producto,['route'=>['productos.update',$producto->id],'method'=>'put'])!!}

					@include('admin.productos.form')
					
				{!! Form::close() !!}
				
			</div>
		</div>		
	</div>
@endsection
