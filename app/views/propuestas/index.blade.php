@extends('layouts.scaffold')

@section('main')

<h1>All Propuestass</h1>

<p>{{ link_to_route('propuestass.create', 'Add New Propuestas', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($propuestass->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Tallerista_id</th>
				<th>Titulo</th>
				<th>Descripcion</th>
				<th>Duracion</th>
				<th>Min_asistentes</th>
				<th>Max_asistentes</th>
				<th>Espacio</th>
				<th>Material_alumnos</th>
				<th>Material_bdt</th>
				<th>Oyentes</th>
				<th>Img</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($propuestass as $propuestas)
				<tr>
					<td>{{{ $propuestas->tallerista_id }}}</td>
					<td>{{{ $propuestas->titulo }}}</td>
					<td>{{{ $propuestas->descripcion }}}</td>
					<td>{{{ $propuestas->duracion }}}</td>
					<td>{{{ $propuestas->min_asistentes }}}</td>
					<td>{{{ $propuestas->max_asistentes }}}</td>
					<td>{{{ $propuestas->espacio }}}</td>
					<td>{{{ $propuestas->material_alumnos }}}</td>
					<td>{{{ $propuestas->material_bdt }}}</td>
					<td>{{{ $propuestas->oyentes }}}</td>
					<td>{{{ $propuestas->img }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('propuestass.destroy', $propuestas->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('propuestass.edit', 'Edit', array($propuestas->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no propuestass
@endif

@stop
