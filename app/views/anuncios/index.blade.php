@extends('site.layout')

@section('content')

@if (Request::is('ofertas*'))
<h1>{{ Lang::get('site.ofertas') }}</h1>
<p><a href="{{ URL::route('publicar-oferta') }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Publicar Oferta</a></p>
@elseif (Request::is('demandas*'))
<h1>{{ Lang::get('site.demandas') }}</h1>
<p><a href="{{ URL::route('publicar-demanda') }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Publicar Demanda</a></p>
@else
<h1>{{ Lang::get('site.anuncios') }}</h1>
<p>
	<a href="{{ URL::route('publicar-oferta') }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Publicar Oferta</a>
	<a href="{{ URL::route('publicar-demanda') }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Publicar Demanda</a>
</p>
@endif


@if ($anuncios->count())
	<?php $cat_ant = $anuncios->first()->categoria_id; ?>
	<div class="row">
		<h2>{{ HTML::link( (Request::is('ofertas*') ? 'ofertas/' : 'demandas/') .$anuncios->first()->categoria->slug, $anuncios->first()->categoria->nombre) }}</h2>

	@foreach ($anuncios as $anuncio)
		@if ($anuncio->categoria_id <> $cat_ant)
	</div><!-- /row -->

	<div class="row">
		<h2>{{ HTML::link( (Request::is('ofertas*') ? 'ofertas/' : 'demandas/') .$anuncio->categoria->slug, $anuncio->categoria->nombre) }}</h2>
			<?php $cat_ant = $anuncio->categoria_id; ?>
		@endif

		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default anuncio">
				<div class="panel-heading c-list">
					<span class="titulo">{{{ $anuncio->titulo }}}{{ (Sentry::check() ? (' <small>('. HTML::link('socis/'.$anuncio->user_id, $anuncio->user->username) .')</small>') : '') }}</span>

					@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
						<ul class="pull-right c-controls">
	                        <li><a href="{{ URL::route('anuncios.edit', $anuncio->id) }}" class="btn btn-block btn-success"><i class="fa fa-edit"></i> Editar</a></li>
	                        <li>{{ Form::open(array('method' => 'DELETE', 'route' => array('anuncios.destroy', $anuncio->id))) }}
	                <button type="submit" class="form-control btn btn-danger btn-block"><i class="fa fa-trash"></i> Eliminar</button>
	            {{ Form::close() }}</li>
	                    </ul>
					@endif

				</div>
				<div class="panel-body">
					<p class="muted">Publicado en {{ HTML::link( (Request::is('ofertas*') ? 'ofertas/' : 'demandas/') .$anuncio->categoria->slug, $anuncio->categoria->nombre) }}
						<span class="fecha muted pull-right">{{ $anuncio->updated_at }}</span></p>
					<p>{{ $anuncio->descripcion }}</p>
				</div>
			</div>
		</div>
	@endforeach
	</div><!-- row -->




@else
	There are no anuncios
@endif

@stop
