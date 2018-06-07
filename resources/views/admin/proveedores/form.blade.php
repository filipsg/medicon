<div class="form-group">
	<label>Nombre: </label>
	{!!Form::text('nombre',null,[
		'class'=>'form-control',
		'placeholder'=>'Nombre del Proveedor...',
		'required'=>'required'
	])!!}
</div>
<div class="form-group">
	<label>Telefono: </label>
	{!!Form::text('telefono',null,[
		'class'=>'form-control',
		'placeholder'=>'Telefono ...',
		'required'=>'required'
	])!!}
</div>

<div class="form-group">
	<button type="submit" class="btn btn-success">Guardar Proveedor</button>
	<a class="btn btn-danger" href="{{ route('proveedores.index') }}">Cancelar</a>
</div>
