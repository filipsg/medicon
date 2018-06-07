@extends('admin.template')
@section('titulo','Calendario')

@section('titulocontenido')
      <h1> CITAS
        <small>Calendario</small>
      </h1>

@endsection

@section('contenido')
	<div id="calendar"></div>
	
@endsection

@section('scripts')

	<!-- fullCalendar -->
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
	        today: 'Hoy',
	        month: 'Mes',
	        week : 'Semana',
	        day  : 'Día'
	      },
	      events:[
	        {
	          title:'Prueba 1',
	          start:'2018-05-17 06:00:00',
	          end:'2018-05-19 23:00:00',
	          backgroundColor:'#f56954'
	        },
	        {
	          title:'Prueba 2',
	          start:'2018-05-24 10:00:00',
	          end:'2018-05-30 23:00:00',
	          backgroundColor:'green'
	        }
	      ]
	      
	    })
	  })
	  
	</script>

@endsection

