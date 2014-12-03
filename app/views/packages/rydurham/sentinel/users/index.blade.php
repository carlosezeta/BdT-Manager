@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
<h1>Usuarios actuales:</h1>
<div class="row">
  <div class="col-md-10 col-md-offset-1">
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<th>Usuario</th>
				<th>Estado</th>
				<th>Opciones</th>
			</thead>
			<tbody>
				@foreach ($users as $user)
					@if ($user->hasAccess('users'))
						<tr>
					@else
						<tr class="danger">
					@endif
						<td><a href="{{ action('Sentinel\UserController@show', array($user->id)) }}">{{ $user->email }}</a></td>
						
							@if ($user->hasAccess('users'))
								<td>Activado</td>
							@else
								<td>No Activado</td>
							@endif
						</td>
						<td>
							<button class="btn btn-info" type="button" onClick="location.href='{{ action('Sentinel\UserController@edit', array($user->id)) }}'">Editar</button> 
							@if (! $user->hasAccess('users'))
								<a class="btn btn-success" href="{{ route('activarUsuario', array($user->id)) }}">Activar</a>
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
  </div>
</div>
@stop
