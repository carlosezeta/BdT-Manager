@extends('site.layout')

@section('content')

<h1>All Tallers</h1>

<p>{{ link_to_route('tallers.create', 'Add New Taller', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($tallers->count())


	@foreach ($tallers as $taller)
		<div class="col-sm-4 img-rounded taller" style="border: 1px solid black;">
			<h3>{{ $taller->titulo }}</h3>
			<p>({{ $taller->tallerista->username }})</p>
			{{ HTML::image('imgs/tallers/'.$taller->img, $taller->titulo, array( 'width' => '100%' )) }}
			<p>Horari: {{ date('G:ia', strtotime($taller->fecha)) }}
		</div>
	@endforeach


@else
	There are no tallers
@endif

@stop
