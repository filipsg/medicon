<div class="form-group">
	<label>Nombres</label>
	{!!Form::text('name',null,[
		'class'=>'form-control',
		'placeholder'=>'Sus nombres...',
		'required'=>'required'
	])!!}
</div>
<div class="form-group">
	<label>Email</label>
	{!!Form::email('email',null,[
		'class'=>'form-control',
		'placeholder'=>'Su email...',
		'required'=>'required'
	])!!}
</div>

<div class="form-group">
	<label>Password</label>
	{!!Form::password('password',[
		'class'=>'form-control',
		'placeholder'=>'Su contraseña...'
	])!!}
</div>
<div class="form-group">
	<label>Perfil</label>
	{!!Form::select('perfil_id',$perfiles,null,[
		'class'=>'form-control',
		'placeholder'=>'Escoger perfil...'
	])!!}
</div>

<div class="form-group">
	<label>Estado</label>
	{!!Form::select('estado_id',$estados,null,[
		'class'=>'form-control',
		'placeholder'=>'Escoger estado...'
	])!!}
</div>
<div class="form-group">
	<button type="submit" class="btn btn-success">Guardar Usuario</button>
	<a class="btn btn-danger" href="{{ route('usuarios.index') }}">Cancelar</a>
</div>
