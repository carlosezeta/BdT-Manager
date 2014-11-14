@extends('layouts.scaffold')

@section('main')

<h1>Show Anuncio</h1>

<p>{{ link_to_route('anuncios.index', 'Return to All anuncios', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>User_id</th>
				<th>Titulo</th>
				<th>Categoria_id</th>
				<th>Descripcion</th>
				<th>Tipo</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
