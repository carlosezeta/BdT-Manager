@extends('site.layout')

@section('content')

<h1>All Tallers</h1>

<p>{{ link_to_route('tallers.create', 'Add New Taller', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($tallers->count())
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
				<th>Tallerita_id</th>
				<th>Plazas</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tallers as $taller)
				<tr>
					<td>{{{ $taller->titulo }}}</td>
					<td>{{{ $taller->descripcion }}}</td>
					<td>{{{ $taller->esgrupo }}}</td>
					<td>{{{ $taller->textorepeticion }}}</td>
					<td>{{{ $taller->fecha }}}</td>
					<td>{{{ $taller->lugar }}}</td>
					<td>{{{ $taller->img }}}</td>
					<td>{{{ $taller->tallerita_id }}}</td>
					<td>{{{ $taller->plazas }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('tallers.destroy', $taller->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('tallers.edit', 'Edit', array($taller->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no tallers
@endif

@stop
