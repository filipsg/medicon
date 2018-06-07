@extends('admin.template')
@section('titulo','Medicos')

@section('titulocontenido')
	<h1>Medicos <small>Listado</small></h1>
@endsection

@section('contenido')
	<div class="container box box-success">
		<br>
		<div class="text-center">
			<a class="btn btn-primary" href="{{ route('medicos.create') }}">Crear Nuevo</a>
			<hr>	
		</div>
		@if(\Session::has('mensaje'))
			<div class="alert alert-success alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			   {{\Session::get('mensaje')}}
			</div>
		@endif
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Nombres</th>
					<th>Email</th>
					<th>Perfil</th>
					<th>Estado</th>
					<th>Telefono</th>
					<th>T.Profesional</th>
					<th>Servicio</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($medicos as $medico)
					<tr> 
						<td>{{$medico->user->name}}</td>
						<td>{{$medico->user->email}}</td>
						<td>{{$medico->user->perfil->nombre}}</td>
						<td>{{$medico->user->estado->nombre}}</td>
						<td>{{$medico->telefono}}</td>
						<td>{{$medico->tarjeta_prof}}</td>
						<td>{{$medico->servicios->nombre}}</td>

						<td><a class="btn btn-warning" href="{{ route('medicos.edit',$medico->id) }}">Editar</a></td>
						<td>
							<form method="post" action="{{ route('medicos.destroy',$medico->id) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-danger" type="submit" onClick="return confirm('Eliminar medico?')">Borrar</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<hr>
		<div class="text-center">
			{{$medicos->links()}}
		</div>	
		
	</div>
@endsection
