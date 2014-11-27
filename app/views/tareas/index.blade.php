@extends('site.layout')

@section('content')

<h1>All Tareas</h1>

<p>{{ link_to_route('tareas.create', 'Add New Tarea', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($tareas->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Autor</th>
				<th>Título</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tareas as $tarea)
				<tr{{ ($tarea->estado == 1) ? " class='success'" : '' }}>
					<td>{{{ $tarea->autor->username }}}</td>
					<td{{ ($tarea->estado == 1) ? " class='tachado'" : '' }}>{{{ $tarea->titulo }}}</td>
                    <td>
                        {{ link_to_route('tarea.completada', 'Completada', array($tarea->id), array('class'=>'btn btn-success')) }}
                        {{ link_to_route('tareas.edit', 'Editar', array($tarea->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no tareas
@endif

@stop
