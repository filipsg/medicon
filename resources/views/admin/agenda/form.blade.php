	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Fecha Inicio</label>
				{!! Form::date('fecha_ini', null, [
                    'class'=>'form-control','id'=>'fecha_ini'
                    ])
                !!}
            </div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Hora inicio</label>
				{!! Form::time('hora_ini', null, [
                    'class'=>'form-control','id'=>'hora_ini'
                    ])
                !!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Fecha Fin</label>
				{!! Form::date('fecha_fin', null, [
                    'class'=>'form-control','id'=>'fecha_fin'
                    ])
                !!}
            </div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Hora fin</label>
				{!! Form::time('hora_fin', null, [
                    'class'=>'form-control','id'=>'hora_fin'
                    ])
                !!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Paciente</label>
			{!! Form::select('paciente_id',$pacientes, null, [
                    'class'=>'form-control','placeholder'=>'Seleccionar Paciente'
                    ])
                !!}
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Médicos</label>
			{!! Form::select('medico_id',$medicos, null, [
                    'class'=>'form-control','placeholder'=>'Seleccionar Médico'
                    ])
                !!}
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Servicio</label>
			{!! Form::select('servicio_id',$servicios, null, [
                    'class'=>'form-control','placeholder'=>'Seleccionar Servicio'
                    ])
                !!}
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Estado</label>
			{!! Form::select('estado_id',$estados, null, [
                    'class'=>'form-control','placeholder'=>'Seleccionar Estado'
                    ])
                !!}
		</div>
	</div>
