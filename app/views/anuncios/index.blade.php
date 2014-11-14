@extends('layouts.scaffold')

@section('main')

<h1>All Anuncios</h1>

<p>{{ link_to_route('anuncios.create', 'Add New Anuncio', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($anuncios->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>User_id</th>
				<th>Titulo</th>
				<th>Categoria_id</th>
				<th>Descripcion</th>
				<th>Tipo</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($anuncios as $anuncio)
				<tr>
					<td>{{{ $anuncio->user_id }}}</td>
					<td>{{{ $anuncio->titulo }}}</td>
					<td>{{{ $anuncio->categoria_id }}}</td>
					<td>{{{ $anuncio->descripcion }}}</td>
					<td>{{{ $anuncio->tipo }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('anuncios.destroy', $anuncio->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('anuncios.edit', 'Edit', array($anuncio->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no anuncios
@endif

@stop
