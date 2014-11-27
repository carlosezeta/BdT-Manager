@extends('site.layout')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>{{ Lang::get('intercambios.pagar') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
            </div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'intercambios.store', 'class' => 'form-horizontal')) }}

    <div class="form-group">
        {{ Form::label('cobrador_id', 'Pagar a:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-12 col-md-8 col-lg-7">
            <select class="form-control" id="cobrador_id" name="cobrador_id">
                <option selected disabled>{{ Lang::get('intercambios.selecciona-user') }}</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('horas', 'Horas:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
          {{ Form::text('horas', Input::old('horas'), array('class'=>'form-control', 'placeholder'=>'Horas')) }}
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-sm-offset-0 col-md-offset-0 col-lg-offset-1">
          {{ Form::text('minutos', Input::old('minutos'), array('class'=>'form-control', 'placeholder'=>'Minutos')) }}
        </div>
    </div>

	<div class="form-group">
        {{ Form::label('categoria_id', 'Categoría:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-12 col-md-8 col-lg-7">
            <select class="form-control" id="categoria_id" name="categoria_id">
                <option selected disabled>{{ Lang::get('anuncios.selecciona_categoria') }}</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
	
	<div class="form-group">
        {{ Form::label('descripcion', 'Descripción:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-12 col-md-8 col-lg-7">
        	{{ Form::text('descripcion', Input::old('descripcion'), array('class' => 'form-control', 'placeholder'=>'Descripción')) }}
        </div>
    </div>

    <div class="form-group">
	    <label class="col-md-2 control-label">&nbsp;</label>
	    <div class="col-sm-12 col-md-8 col-lg-7">
	      {{ Form::submit('Pagar', array('class' => 'btn btn-lg btn-block btn-primary')) }}
	    </div>
	</div>

{{ Form::close() }}

@stop