@extends('site.layout')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>{{ Lang::get('anuncios.editar_anuncio') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($anuncio, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('anuncios.update', $anuncio->id))) }}


        <div class="form-group">
            {{ Form::label('titulo', Lang::get('anuncios.titulo'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('titulo', Input::old('titulo'), array('class'=>'form-control', 'placeholder'=> Lang::get('anuncios.titulo'))) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('categoria_id', Lang::get('anuncios.categoria'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                <select class="form-control" id="categoria_id" name="categoria_id">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('descripcion', Lang::get('anuncios.descripcion'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('descripcion', Input::old('descripcion'), array('class'=>'form-control', 'placeholder'=>Lang::get('anuncios.descripcion'))) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('tipo', Lang::get('anuncios.tipo'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::select('tipo', array('O'=>Lang::get('anuncios.oferta'), 'D'=>Lang::get('anuncios.demanda')), null, array('class'=>'form-control', 'placeholder'=>'Tipo')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit(Lang::get('site.actualizar'), array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('anuncios.show', Lang::get('site.cancelar'), $anuncio->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop