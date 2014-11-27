@extends('site.layout')

@section('content')

<h1>Show Tarea</h1>

<p>{{ link_to_route('tareas.index', 'Return to All tareas', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Autor</th>
			<th>Título</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $tarea->autor->username }}}</td>
			<td>{{{ $tarea->titulo }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('tareas.destroy', $tarea->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('tareas.edit', 'Edit', array($tarea->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
