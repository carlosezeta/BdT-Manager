@extends('site.layout')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>{{ Lang::get('anuncios.publicar_oferta') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'anuncios.store', 'class' => 'form-horizontal')) }}

        <div class="form-group hidden">
            {{ Form::label('user_id', 'User_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'user_id', Session::get('userId'), array('class'=>'form-control')) }}
            </div>
        </div>

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
                    <option selected disabled>{{ Lang::get('anuncios.selecciona_categoria') }}</option>
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

        <div class="form-group hidden">
            {{ Form::label('tipo', Lang::get('anuncios.tipo'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('text', 'tipo', 'O') }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Publicar', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


