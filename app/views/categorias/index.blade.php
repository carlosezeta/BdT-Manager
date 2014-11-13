@extends('site.layout')

@section('content')

<h1>{{ Lang::get('categorias.todas') }}</h1>

<p>{{ link_to_route('admin.categorias.create', Lang::get('categorias.nueva'), null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($categorias->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>{{ Lang::get('categorias.nombre') }}</th>
				<th>{{ Lang::get('categorias.descripcion') }}</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($categorias as $categoria)
				<tr>
					<td>{{{ $categoria->nombre }}}</td>
					<td>{{{ $categoria->descripcion }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.categorias.destroy', $categoria->id))) }}
                            {{ Form::submit(Lang::get('site.delete'), array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.categorias.edit', Lang::get('site.edit'), array($categoria->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	{{ Lang::get('categorias.ninguna') }}
@endif

@stop
