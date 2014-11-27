@extends('site.layout')

@section('content')

<h1>Propuestas de Talleres Pendientes</h1>

@if ($propuestas->count())
	@foreach ($propuestas as $propuesta)
	<div class="row">
		<h2>{{{ $propuesta->titulo }}} ({{{ $propuesta->tallerista->username }}})<span class="propuesta-fecha">{{ $propuesta->created_at }}</h2>
		{{ HTML::image('imgs/tallers/'.$propuesta->img, $propuesta->titulo, array( 'width' => '100px' )) }}
		{{ $propuesta->descripcion }}
		<p><strong>Duración: </strong>{{ $propuesta->duracion }}</p>
		<p><strong>Material Alumnos: </strong>{{ $propuesta->material_alumnos }}</p>
		<p><strong>Material BdT: </strong>{{ $propuesta->material_bdt }}</p>
		<p><strong>Horario Preferido: </strong>{{ $propuesta->horario }}</p>

        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('propuestas.destroy', $propuesta->id))) }}

        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}

        {{ Form::close() }}

        {{ link_to_route('propuestas.edit', 'Edit', array($propuesta->id), array('class' => 'btn btn-info')) }}
	</div>
	@endforeach

@else
	There are no propuestas
@endif

@stop
