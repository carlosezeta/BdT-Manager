@extends('site.layout')

@section('content')

@if (Request::is('ofertas*'))
	<?php
		$txtanuncios = 'ofertas';
		$txtanuncio = 'oferta';
		$concreto = true;
	?>
@elseif (Request::is('demandas*'))
	<?php
		$txtanuncios = 'demandas';
		$txtanuncio = 'demanda';
		$concreto = true;
	?>
@else
	<?php
		$txtanuncios = 'anuncios';
		$txtanuncio = 'anuncio';
		$concreto = false;
	?>
@endif

<h1>{{ Lang::get('site.'.$txtanuncios) }}</h1>
@if (Sentry::check())
	@if ((Sentry::getUser()->hasAccess('users')))
		@if ($concreto)
			<p><a href="{{ URL::route('publicar-'.$txtanuncio) }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> {{ Lang::get('anuncios.publicar').' '.Lang::get('anuncios.'.$txtanuncio) }}</a></p>
		@else
			<p>
				<a href="{{ URL::route('publicar-oferta') }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> {{ Lang::get('anuncios.publicar-oferta') }}</a>
				<a href="{{ URL::route('publicar-demanda') }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> {{ Lang::get('anuncios.publicar-demanda') }}</a>
			</p>
		@endif
	@endif
@endif
@if ($concreto)
	<div class="col-sm-6">
	<p>Ver últimos: <a href="{{ URL::route(Lang::get($txtanuncios).'-ultimos-dias', '3') }}">3 días</a> / <a href="{{ URL::route(Lang::get($txtanuncios).'-ultimos-dias', '7') }}">7 días</a> / <a href="{{ URL::route(Lang::get($txtanuncios).'-ultimos-dias', '15') }}">15 días</a> / <a href="{{ URL::route(Lang::get($txtanuncios).'-ultimos-dias', '30') }}">30 días</a> / <a href="{{ URL::route(Lang::get($txtanuncios).'-ultimos-dias', '60') }}">60 días</a> / <a href="{{ URL::route(Lang::get($txtanuncios).'-ultimos-dias', '90') }}">90 días</a></p>
	</div>
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-9">
				<select id="{{ $txtanuncios }}-cat" name="cat" class="form-control input-sm col-sm-1">
					@foreach ($categorias as $categoria)
						<option value="{{ $categoria->slug }}">{{ $categoria->nombre }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-sm-3">
				<a href="" id="filtrar-{{ $txtanuncios }}" class="btn btn-block btn-success btn-sm">Filtrar</a>
			</div>
		</div>
	</div>
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
					<span class="titulo">{{{ $anuncio->titulo }}}
					@if (Sentry::check())
						{{ (Sentry::getUser()->hasAccess('users') ? (' <small>('. HTML::link('socis/'.$anuncio->user_id, $anuncio->user->username) .')</small>') : '') }}
					@endif
					</span>

					@if (Sentry::check())
						@if ((Sentry::getUser()->hasAccess('admin')) || $anuncio->user_id == Sentry::getUser()->id)
						<span class="pull-right c-controls btn-group">
							{{ Form::open(array('method' => 'DELETE', 'route' => array('anuncios.destroy', $anuncio->id))) }}
	                        <a href="{{ URL::route('anuncios.edit', $anuncio->id) }}" class="btn btn-success"><i class="fa fa-edit"></i> Editar</a> 
	                			<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
	            			{{ Form::close() }}
	                    </span>
	                    @endif
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
	{{ Lang::get('site.no-hay-nada') }}
@endif

@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready( function ()
	{
		$('#ofertas-cat').change(function()
		{
			var action = $(this).find('option:selected').val();
  			$("#filtrar-ofertas").attr("href", "/ofertas/" + action);
		});
		$('#demandas-cat').change(function()
		{
			var action = $(this).find('option:selected').val();
  			$("#filtrar-demandas").attr("href", "/demandas/" + action);
		});
	});
</script>
@stop