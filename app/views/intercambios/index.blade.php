@extends('site.layout')

@section('content')

<h1>{{ Lang::get('intercambios.todos') }}</h1>

<p>{{ link_to_route('intercambios.create', Lang::get('intercambios.pagar'), null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($intercambios->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>{{ Lang::get('intercambios.fecha') }}</th>
				<th>{{ Lang::get('intercambios.de') }}</th>
				<th>{{ Lang::get('intercambios.a') }}</th>
				<th>{{ Lang::get('intercambios.horas') }}</th>
				<th>{{ Lang::get('intercambios.descripcion') }}</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($intercambios as $intercambio)
				<tr>
					<td>{{ $intercambio->created_at }}</td>
					<td>{{ User::find($intercambio->pagador_id)->username }}</td>
                    <td>{{ User::find($intercambio->cobrador_id)->username }}</td>
                    <td>{{ $intercambio->horas }}</td>
                    <td>{{ $intercambio->descripcion }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	{{ Lang::get('categorias.ninguna') }}
@endif

@stop