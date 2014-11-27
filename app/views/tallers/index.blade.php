@extends('site.layout')

@section('content')

<h1>All Tallers</h1>

@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
	<p><a href="{{ URL::route('tallers.create') }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> {{ Lang::get('talleres.publicar') }}</a></p>
@else
	<p><a href="{{ URL::route('propuestas.create') }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> {{ Lang::get('talleres.proponer') }}</a></p>
@endif

@if ($tallers->count())


	@foreach ($tallers as $taller)
		<div class="col-sm-4 img-rounded taller shadow-box" style="border: 1px solid black;">
			<h3>{{ $taller->titulo }}</h3>
			<p>({{ $taller->tallerista->username }})</p>
			{{ HTML::image('imgs/tallers/'.$taller->img, $taller->titulo, array( 'width' => '100%' )) }}
			<p>Horari: {{ date('G:ia', strtotime($taller->fecha)) }}
		</div>
	@endforeach


@else
	{{ Lang::get('site.no-hay-nada') }}
@endif

@stop
