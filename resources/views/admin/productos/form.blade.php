<div class="form-group">
	<label>Nombre Producto: </label>
	{!!Form::text('nombre',null,[
		'class'=>'form-control',
		'placeholder'=>'Nombre...',
		'required'=>'required'
	])!!}
</div>
<div class="form-group">
	<label>Precio: </label>
	{!!Form::text('precio',null,[
		'class'=>'form-control',
		'placeholder'=>'Precio...',
		'required'=>'required'
	])!!}
</div>

<div class="form-group">
	<label>Proveedor</label>
	{!!Form::select('proveedor_id',$proveedores,null,[
		'class'=>'form-control',
		'placeholder'=>'Escoger proveedor...'
	])!!}
</div>

<div class="form-group">
	<button type="submit" class="btn btn-success">Guardar Producto</button>
	<a class="btn btn-danger" href="{{ route('productos.index') }}">Cancelar</a>
</div>
