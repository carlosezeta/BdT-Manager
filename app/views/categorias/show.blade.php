@extends('site.layout')

@section('content')

<h1>{{ Lang::get('categorias.ver') }}</h1>

<p>{{ link_to_route('categorias.index', Lang::get('categorias.volver'), null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>{{ Lang::get('categorias.nombre') }}</th>
			<th>{{ Lang::get('categorias.descripcion') }}</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $categoria->nombre }}}</td>
					<td>{{{ $categoria->descripcion }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.categorias.destroy', $categoria->id))) }}
                            
							{{ Form::button('<i class="fa fa-trash"></i> '.Lang::get('site.delete'), array('type' => 'submit', 'class' => 'btn btn-danger')) }}
                            
                        {{ Form::close() }}
                        {{ link_to_route('admin.categorias.edit', Lang::get('site.edit'), array($categoria->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
