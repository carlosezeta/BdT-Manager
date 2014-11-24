@extends('site.layout')


@section('content')

<h1>{{ $titulo_pagina }}</h1>

<p>{{ link_to_route('intercambios.create', Lang::get('intercambios.pagar'), null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($intercambios->count())
@foreach ($intercambios as $intercambio)
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default intercambio">
				<div class="panel-heading titulo">
					{{ HTML::link('socis/'.$intercambio->pagador_id, $intercambio->pagador->username) }}
						<icon class="icon icon-busy"></icon>
						<icon class="fa fa-long-arrow-right"></icon>
  {{ HTML::link('socis/'.$intercambio->cobrador_id, $intercambio->cobrador->username) }} ({{ $intercambio->horas }}
						@if ($intercambio->horas > 1)
							horas)
						@else
							hora)
						@endif
					<span class="muted">{{ HTML::link( 'intercambios/categoria/' .$intercambio->categoria->slug, $intercambio->categoria->nombre) }}</span>
				</div><span class="fecha muted pull-right">{{ $intercambio->created_at }}</span>
				<div class="panel-body">
					<strong>{{ $intercambio->pagador->username}}:</strong> {{ $intercambio->descripcion }}
				</div>
			</div>
		</div>
	</div>
@endforeach


@else
	{{ Lang::get('site.no-hay-nada') }}
@endif

@stop