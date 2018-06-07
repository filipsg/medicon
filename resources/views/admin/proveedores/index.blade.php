@extends('admin.template')
@section('titulo','Proveedores')

@section('titulocontenido')
	<h1>Proveedores <small>Listado</small></h1>
@endsection

@section('contenido')
	<div class="container box box-success">
		<br>
		<div class="text-center">
			<a class="btn btn-primary" href="{{ route('proveedores.create') }}">Crear Nuevo</a>
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
					<th>ID</th>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($proveedores as $proveedor)
					<tr> 
						<td>{{$proveedor->id}}</td>
						<td>{{$proveedor->nombre}}</td>
						<td>{{$proveedor->telefono}}</td>

						<td><a class="btn btn-warning" href="{{ route('proveedores.edit',$proveedor->id) }}">Editar</a></td>
						<td>
							<form method="post" action="{{ route('proveedores.destroy',$proveedor->id) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-danger" type="submit" onClick="return confirm('Eliminar proveedor?')">Borrar</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<hr>
		<div class="text-center">
			{{$proveedores->links()}}
		</div>	
		
	</div>
@endsection
