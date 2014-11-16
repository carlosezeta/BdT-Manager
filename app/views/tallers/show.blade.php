@extends('site.layout')

@section('content')

<h1>Show Taller</h1>

<p>{{ link_to_route('tallers.index', 'Return to All tallers', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Titulo</th>
				<th>Descripcion</th>
				<th>Esgrupo</th>
				<th>Textorepeticion</th>
				<th>Fecha</th>
				<th>Lugar</th>
				<th>Img</th>
				<th>Tallerista_id</th>
				<th>Plazas</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $taller->titulo }}}</td>
					<td>{{{ $taller->descripcion }}}</td>
					<td>{{{ $taller->esgrupo }}}</td>
					<td>{{{ $taller->textorepeticion }}}</td>
					<td>{{{ $taller->fecha }}}</td>
					<td>{{{ $taller->lugar }}}</td>
					<td>{{{ $taller->img }}}</td>
					<td>{{{ $taller->tallerista_id }}}</td>
					<td>{{{ $taller->plazas }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('tallers.destroy', $taller->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('tallers.edit', 'Edit', array($taller->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
