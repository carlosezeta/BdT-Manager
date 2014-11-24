@extends('site.layout')

@section('title')
	Laravel PHP Framework
@stop

@section('styles')
	<link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
  <style>
  .fc-event {
    border: 1px solid #6DA376;
    background-color: #6DA376;
  }
  </style>
@stop

@section('content')
  <div class="row">
    <div class="col-lg-7 col-md-12">
    	<div id="calendar"></div>
    </div>

    <div class="col-lg-5 col-md-12">
      <h1 class="text-center">Últimas Noticias</h1>
      
      @foreach ($noticias as $noticia)
        <h2>{{ $noticia->titulo }}</h2>
        <h4>{{ $noticia->entradilla }}</h2>
        <p>{{ $noticia->mensaje }}</p>
 
        <p>
          <span class="badge">Publicado el {{ $noticia->created_at }}</span>
          
          <span class="pull-right">
            <a class="btn btn-social-icon btn-facebook btn-xs">
              <i class="fa fa-facebook"></i>
            </a>
            <a class="btn btn-social-icon btn-twitter btn-xs">
              <i class="fa fa-twitter"></i>
            </a>
            <a class="btn btn-social-icon btn-google-plus btn-xs">
              <i class="fa fa-google-plus"></i>
            </a>
          </span>
        </p>

        <hr>
      @endforeach

    </div><!-- col-md -->
  </div><!-- row -->

@stop

@section('scripts')
<script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
<script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
  <script type='text/javascript' src="{{ asset('fullcalendar/gcal.js') }}"></script>
  <script type='text/javascript' src="{{ asset('fullcalendar/lang/ca.js') }}"></script>

 
<script type='text/javascript'>

  $(document).ready(function() {
      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();
      var currentLangCode = 'ca';

      $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          googleCalendarApiKey: 'AIzaSyATozKQoheigIqMn0haBvFEN4o_wKQkdS0',
          eventSources: [
            {
                googleCalendarId: 'bdtpontdeldimoni@gmail.com'
            },
            {
                googleCalendarId: 'dksm23k4frv3vbdn571748tdfs@group.calendar.google.com',
                overlap: false,
                rendering: 'background',
                color: '#ff9f89'
            }
          ]
      });
  });

</script>


@stop