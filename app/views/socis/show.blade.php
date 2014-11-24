@extends('site.layout')


{{-- Content --}}
@section('content')

<ul class="nav nav-tabs show-soci">
  <li class="active"><a href="#perfil" data-toggle="tab"><strong>{{ $user->username }}</strong></a></li>
  <li><a href="#ofertas" data-toggle="tab">{{ Lang::get('site.ofertas') }}</a></li>
  <li><a href="#demandas" data-toggle="tab">{{ Lang::get('site.demandas') }}</a></li>
  <li><a href="#intercambios" data-toggle="tab">{{ Lang::get('site.intercambios') }}</a></li>
</ul>

	<div class="tab-content soci">
        <div class="tab-pane active" id="perfil">
			
			
			  <div class="row">
			  	
	            <div class="col-xs-12 col-sm-3 col-sm-offset-1 col-xs-offset-0 text-center">
	              
	              {{ HTML::image('imgs/perfiles/male.png', '', ['class' => 'center-block img-circle img-thumbnail img-responsive']) }}

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
	              <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>

	              <p><strong>E-mail: </strong> {{ $user->email }} </p>
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
									<td>{{ $user->horas }}</td>
								</tr>
								<tr>
									<td><strong>Intercambios</strong></td>
									<td>{{ $intercambios->count() }}</td>
								</tr>
								<tr>
									<td><strong>Horas intercambiadas</strong></td>
									<td>{{ $intercambios->sum('horas') }}</td>
								</tr>
								<tr>
									<td><strong>Valoración</strong></td>
									<td>100% (1 positivo, 0 negativos)</td>
								</tr>
								<tr>
									<td><strong>Último intercambio</strong></td>
									<td>{{ $intercambios->first()->created_at }}</td>
								</tr>
								<tr>
									<td><strong>Fecha socio</strong></td>
									<td>{{ $user->created_at }}</td>
								</tr>
								
							</tbody>
						</table>
						
					</div> <!-- /widget-content -->
				
				</div> <!-- /widget -->

	            </div>
	            <!--/col-->
			  </div>
	          <!--/row-->
	            <div class="clearfix"></div>
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



        <div class="tab-pane" id="ofertas">
			@if ($ofertas->count())

				@foreach ($ofertas as $anuncio)
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
			@if ($demandas->count())

				@foreach ($demandas as $anuncio)
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
			@if ($intercambios->count())
				@foreach ($intercambios as $intercambio)
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


  	<div class="well clearfix" style="margin-top: 100px;">
	    <div class="col-md-8">
		    @if ($user->first_name)
		    	<p><strong>First Name:</strong> {{ $user->first_name }} </p>
			@endif
			@if ($user->last_name)
		    	<p><strong>Last Name:</strong> {{ $user->last_name }} </p>
			@endif
		    <p><strong>Email:</strong> {{ $user->email }}</p>
		    
		</div>
		<div class="col-md-4">
			<p><em>Account created: {{ $user->created_at }}</em></p>
			<p><em>Last Updated: {{ $user->updated_at }}</em></p>
		</div>
	</div>

	



@stop
