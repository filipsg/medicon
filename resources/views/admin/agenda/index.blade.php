@extends('admin.template')

@section('titulo','Calendario')

@section('titulocontenido')
	<h1>Citas <small>Calendario</small></h1>
@endsection



@section('contenido')
	@include('admin.secciones.mensajes')	
	<div id="calendar"></div>
	<!-- INICIO MODAL -->
	<div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Crear Cita</h4>
          </div>
          <div class="modal-body">
			<!-- FORMULARIO -->
			{!!Form::open(['route'=>'calendario.store','method'=>'post'])!!}
            @include('admin.agenda.form')
				<hr>
				<div class="text-center">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-success">Guardar Cita</button>	
				</div>							
		                
			{!! Form::close() !!}
            <!-- FIN FORMULARIO -->
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('scripts')
	<script src="{{ asset('adminlte/bower_components/moment/moment.js') }}"></script>
	<script src="{{ asset('adminlte/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
	<script src="{{ asset('adminlte/bower_components/fullcalendar/dist/locale/es.js') }}"></script>

	<script>
	  $(function () {
	    /* initialize the calendar
	     -----------------------------------------------------------------*/
	    //Date for the calendar events (dummy data)
	    var date = new Date()
	    var d    = date.getDate(),
	        m    = date.getMonth(),
	        y    = date.getFullYear()
	    $('#calendar').fullCalendar({
	      header    : {
	        left  : 'prev,next today',
	        center: 'title',
	        right : 'month,agendaWeek,agendaDay'
	      },
	      buttonText: {
	        today: 'hoy',
	        month: 'mes',
	        week : 'semana',
	        day  : 'dia'
	      },
	      events: {!!$agendas!!},
	      //2018-05-30 adicionado para abrir una cita 
	      dayClick: function(date, jsEvent, view) {
		    //alert('Clicked on: ' + date.format());
		    $("#fecha_ini").val(date.format());
		    $("#fecha_fin").val(date.format());
		    $("#modal-default").modal('show');
		  },
		  //2018-05-30 adicionado para modificar cita
		  eventClick: function(calEvent, jsEvent, view) {
		  	//alert('Event:' + calEvent.title);
		  	window.open('calendario/'+calEvent.id+'/edit',"_self");
		  }
	    })
	  })
	  
	</script>
@endsection