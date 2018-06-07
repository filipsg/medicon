<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<img src="http://osmaro.com/medicon/logo-doctores.png" alt="medicon">
	<h1>Listado de Usuarios</h1>
		<table width='100%' border="1px">
			<tr>
				<th>Nombres</th>
				<th>Email</th>
				<th>Perfil</th>
				<th>Estado</th>

			</tr>
			<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{$usuario->name}}</td>
						<td>{{$usuario->email}}</td>
						<td>{{$usuario->perfil->nombre}}</td>
						<td>{{$usuario->estado->nombre}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>

</body>
</html>