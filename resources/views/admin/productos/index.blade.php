@extends('admin.template')
@section('titulo','Productos')

@section('titulocontenido')
	<h1>Productos <small>Listado</small></h1>
@endsection

@section('contenido')
	<div class="container box box-success">
		<br>
		<div class="text-center">
			<a class="btn btn-primary" href="{{ route('productos.create') }}">Crear Nuevo</a>
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
					<th>Precio</th>
					<th>Proveedor</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($productos as $producto)
					<tr> 
						<td>{{$producto->id}}</td>
						<td>{{$producto->nombre}}</td>
						<td>{{$producto->precio}}</td>
						<td>{{$producto->proveedor->nombre}}</td>

						<td><a class="btn btn-warning" href="{{ route('productos.edit',$producto->id) }}">Editar</a></td>
						<td>
							<form method="post" action="{{ route('productos.destroy',$producto->id) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-danger" type="submit" onClick="return confirm('Eliminar Producto?')">Borrar</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<hr>
		<div class="text-center">
			{{$productos->links()}}
		</div>	
		
	</div>
@endsection
