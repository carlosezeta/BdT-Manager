@extends('site.layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/jquery.Jcrop.min.css') }}" type="text/css" />
<style>
	.jcrop-keymgr { opacity: 0;}
</style>
@stop


{{-- Content --}}
@section('content')

<!-- Modal Imagen -->
<div class="modal fade" id="modal-imagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
				<h4 class="modal-title" id="myModalLabel">Editar imagen</h4>
			</div>
			<div class="modal-body">
				<h2>Subir Imagen:</h2>
				{{ Form::open(array('route' => 'post-img', 'class' => 'form-horizontal', 'files' => true)) }}
					<div class="form-group">
						{{ Form::label('img', 'Imagen:', array('class'=>'col-md-2 control-label')) }}
			            <div class="col-sm-8">
						{{ Form::file('img', array('class'=>'form-control', 'placeholder'=>'Img')) }}
			            </div>
			            <div class="col-sm-2">
			            	{{ Form::submit( Lang::get('site.subir') , array('class' => 'btn btn-block btn-primary')) }}
			            </div>
			        </div>
						{{ Form::hidden('user-id', $data['user']->id, [ 'id' => 'user-id' ]) }}

				{{ Form::close() }}
		@if ($data['imagen'] == null)
			</div>
		@else
		<h2>Seleccione el recorte de la imagen:</h2>
				{{ Form::open(['route' => 'soci-crop', 'onsubmit' => 'return checkCords();']) }}
					{{ HTML::image($data['imagen'], '', ['class' => 'center-block', 'id' => 'foto-crop']) }}
					{{ Form::hidden('img_bckp', $data['imagen'], ['id' => 'img_bckp']) }}
					{{ Form::hidden('src', $data['imagen'], array('id' => 'src')) }}
			        {{ Form::hidden('x', '', array('id' => 'x')) }}
			        {{ Form::hidden('y', '', array('id' => 'y')) }}
			        {{ Form::hidden('w', '', array('id' => 'w')) }}
			        {{ Form::hidden('h', '', array('id' => 'h')) }}
			        {{ Form::hidden('user-id', $data['user']->id) }}
			        <div class="text-right">
					{{ Form::submit( 'Aceptar Recorte' , array('class' => 'btn btn-lg btn-primary btn-recorte')) }}
					</div>
				{{ Form::close() }}
			</div>

		@endif
		</div>
	</div>
</div>

<input type="hidden" id="modal" value="{{ $data['modal'] }}"/>









<ul class="nav nav-tabs show-soci">
  <li class="active"><a href="#perfil" data-toggle="tab"><strong>{{ $data['user']->username }}</strong></a></li>
  <li><a href="#ofertas" data-toggle="tab">{{ Lang::get('site.ofertas') }}</a></li>
  <li><a href="#demandas" data-toggle="tab">{{ Lang::get('site.demandas') }}</a></li>
  <li><a href="#intercambios" data-toggle="tab">{{ Lang::get('site.intercambios') }}</a></li>
</ul>

	<div class="tab-content soci">
        <div class="tab-pane active" id="perfil">
			
			
			  <div class="row">
			  	
	            <div class="col-xs-12 col-sm-3 col-sm-offset-1 col-xs-offset-0 text-center perfil-bloque-izquierdo">
					<div class="foto-perfil">
						<div class="foto-caption img-circle">
		                    
							<button type="button" class="btn btn-primary foto-caption-btn" data-toggle="modal" data-target="#modal-imagen">Editar</button>

		                </div>
		                @if ($data['user']->img == null)
		                {{ HTML::image('imgs/perfiles/male.png', '', ['class' => 'center-block img-circle img-thumbnail img-responsive']) }}
						@else
							{{ HTML::image('imgs/perfiles/'.$data['user']->img, '', ['class' => 'center-block img-circle img-thumbnail img-responsive']) }}
						@endif
	          		</div>

					<div class="col-sm-12 social-buttons">
			          <a class="btn btn-block btn-social btn-facebook" href="">
			            <i class="fa fa-facebook"></i> Facebook
			          </a>
			          <a class="btn btn-block btn-social btn-twitter" href="">
			            <i class="fa fa-twitter"></i> Twitter
			          </a>
			           <a class="btn btn-block btn-social btn-linkedin" href="">
			            <i class="fa fa-linkedin"></i> LinkedIn
			          </a>
			        </div>

	            </div>
	            <!--/col--> 
	            <div class="col-xs-12 col-sm-7" id="datos-perfil">
	            	<a href="#" class="pull-right btn btn-success perfil-editar"><icon class="fa fa-edit"></icon> Editar</a>
	              <h2>{{ $data['user']->first_name }} {{ $data['user']->last_name }}</h2>

	              <p><strong>E-mail: </strong> {{ $data['user']->email }} </p>
	              <p><strong>Teléfono: </strong> 645 97 83 12 </p>
	              <p><strong>Teléfono 2: </strong> 645 97 83 12 </p>
	              <p><strong>Ciudad: </strong> Girona </p>


 
				<div class="widget stacked widget-table action-table">
	    				
					<div class="widget-header">
						<icon class="fa fa-th-list"></icon>
						<h3>Actividad en el BdT</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<table class="table table-striped table-bordered">
							<tbody>
								<tr>
									<td><strong>Saldo</strong></td>
									<td>{{ $data['user']->horas }}</td>
								</tr>
								<tr>
									<td><strong>Intercambios</strong></td>
									<td>{{ $data['intercambios']->count() }}</td>
								</tr>
								<tr>
									<td><strong>Horas intercambiadas</strong></td>
									<td>{{ $data['intercambios']->sum('horas') }}</td>
								</tr>
								<tr>
									<td><strong>Valoración</strong></td>
									<td>100% (1 positivo, 0 negativos)</td>
								</tr>
								<tr>
									<td><strong>Último intercambio</strong></td>
									<td>{{ $data['intercambios']->first()->created_at }}</td>
								</tr>
								<tr>
									<td><strong>Fecha socio</strong></td>
									<td>{{ $data['user']->created_at }}</td>
								</tr>
								
							</tbody>
						</table>
						
					</div> <!-- /widget-content -->
				
				</div> <!-- /widget -->


	          	<div class="row perfil-botones">
		            <div class="col-xs-12 col-sm-4 col-sm-offset-2 col-xs-offset-0 perfil-botones">
		              <button class="btn btn-success btn-lg btn-block"><span class="fa fa-envelope-o"></span> Enviar Mensaje </button>
		            </div>
		            <!--/col-->
		            <div class="col-xs-12 col-sm-4 perfil-botones">
		              <a href="/intercambios/create?cobrador_id=2" class="btn btn-info btn-lg btn-block"><icon class="icon icon-busy"></icon>
					  <icon class="fa fa-long-arrow-right"></icon> Pagar intercambio </a>
		            </div>
		            <!--/col-->


				</div>
				<!--/row-->


            </div>
            <!--/col-->
		  </div>
          <!--/row-->
	      <div class="clearfix"></div>


        </div>



        <div class="tab-pane" id="ofertas">
			@if ($data['ofertas']->count())

				@foreach ($data['ofertas'] as $anuncio)
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="panel panel-success anuncio">
							<div class="panel-heading c-list">
								<span class="titulo">{{{ $anuncio->titulo }}}</span>

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
								<p class="muted">Publicado en {{ HTML::link( 'ofertas/'.$anuncio->categoria->slug, $anuncio->categoria->nombre) }}
									<span class="fecha muted pull-right">{{ $anuncio->updated_at }}</span></p>
								<p>{{ $anuncio->descripcion }}</p>
							</div>
						</div>
					</div>
				</div><!-- row -->	
				@endforeach

			@else
				{{ Lang::get('site.no-hay-nada') }}
			@endif
        </div>





        <div class="tab-pane" id="demandas">
			@if ($data['demandas']->count())

				@foreach ($data['demandas'] as $anuncio)
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="panel panel-danger anuncio">
							<div class="panel-heading c-list">
								<span class="titulo">{{{ $anuncio->titulo }}}</span>

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
								<p class="muted">Publicado en {{ HTML::link( 'demandas/'.$anuncio->categoria->slug, $anuncio->categoria->nombre) }}
									<span class="fecha muted pull-right">{{ $anuncio->updated_at }}</span></p>
								<p>{{ $anuncio->descripcion }}</p>
							</div>
						</div>
					</div>
				</div><!-- row -->	
				@endforeach
				
			@else
				{{ Lang::get('site.no-hay-nada') }}
			@endif
        </div>





        <div class="tab-pane" id="intercambios">
			@if ($data['intercambios']->count())
				@foreach ($data['intercambios'] as $intercambio)
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<div class="panel panel-{{ (($intercambio->cobrador_id == Sentry::getUser()->id) ? 'success' : 'danger') }} intercambio">
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
        </div>

	</div>
@stop

@section('scripts')
<script src="{{ asset('js/jquery.Jcrop.min.js') }}"></script>

<script type="text/javascript">
	var modal;
	if($('#modal').val() == 'true'){
		modal = true;
	}else{
		modal = false;
	}

	$( document ).ready(function() {
	    $("[rel='tooltip']").tooltip();    
	 
	    $('.foto-perfil').hover(
	        function(){
	            $(this).find('.foto-caption').fadeIn(250); //.slideDown(250)
	        },
	        function(){
	            $(this).find('.foto-caption').fadeOut(250); //.slideUp(205)
	        }
	    );
	    $('#modal-imagen').modal({show: modal});
	});

	$(function() {
        $('#foto-crop').Jcrop({
        	aspectRatio: 1,
        	onChange: updateCoords,
            onSelect: updateCoords
        });
    });

    function updateCoords(c) {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };

    function checkCoords(){
    	if(parseInt($('#w').val())) return true;
    	alert ('Debe realizar una selección');
    	return false;
    };
</script>

@stop
