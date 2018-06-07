@extends('admin.template')

@section('titulo','Calendario')

@section('titulocontenido')
	<h1>Citas <small>Calendario</small></h1>
@endsection

@section('contenido')
	<div class="container box box-success">
		@include('admin.secciones.errores')
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				{!!Form::model($agenda,['route'=>['calendario.update',$agenda->id],'method'=>'put','files'=>'true'])!!}

					@include('admin.agenda.form')
					<hr>
					<div class="text-center">
						<a class="btn btn-danger" href="{{ route('calendario.index') }}">Cancelar</a>
						<button type="submit" class="btn btn-success">Guardar Cita</button>	
					</div>							
				<!-- FIN FORMULARIO -->
				{!! Form::close() !!}
				
			</div>
		</div>		
	</div>
@endsection