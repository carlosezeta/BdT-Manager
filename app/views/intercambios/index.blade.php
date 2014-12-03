@extends('site.layout')


@section('content')

<h1>{{ $titulo_pagina }}</h1>

<p>{{ link_to_route('intercambios.create', Lang::get('intercambios.pagar'), null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($intercambios->count())
@foreach ($intercambios as $intercambio)
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			@if ($intercambio->cobrador_id == Sentry::getUser()->id)
			<div class="panel panel-success intercambio">
			@elseif ($intercambio->pagador_id == Sentry::getUser()->id)
			<div class="panel panel-danger intercambio">
			@else
			<div class="panel panel-default intercambio">
			@endif
				<div class="panel-heading titulo">
					{{ HTML::image('imgs/perfiles/'.$intercambio->pagador->img,'',['width'=>'32px', 'class'=>'img-circle']) }} {{ HTML::link('socis/'.$intercambio->pagador_id, $intercambio->pagador->username) }}
						<icon class="icon icon-busy"></icon>
						<icon class="fa fa-long-arrow-right"></icon>
  					{{ HTML::image('imgs/perfiles/'.$intercambio->cobrador->img,'',['width'=>'32px', 'class'=>'img-circle']) }} {{ HTML::link('socis/'.$intercambio->cobrador_id, $intercambio->cobrador->username) }} ({{ $intercambio->horas }}
						@if ($intercambio->horas > 1)
							horas)
						@else
							hora)
						@endif
					<span class="muted">{{ HTML::link( 'intercambios/categoria/' .$intercambio->categoria->slug, $intercambio->categoria->nombre) }}</span>
				</div>

				@if (Sentry::check())
					@if ((Sentry::getUser()->hasAccess('admin')))
					<span class="c-controls btn-group">
						{{ Form::open(array('method' => 'DELETE', 'route' => array('intercambios.destroy', $intercambio->id))) }}
                        <a href="{{ URL::route('intercambios.edit', $intercambio->id) }}" class="btn btn-success"><i class="fa fa-edit"></i> Editar</a> 
                			<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
            			{{ Form::close() }}
                    </span>
                    @endif
				@endif

				<span class="fecha muted pull-right">{{ $intercambio->created_at }}</span>
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