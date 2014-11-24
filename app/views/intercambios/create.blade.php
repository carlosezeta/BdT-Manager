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
        <div class="col-sm-10">
          {{ Form::select('cobrador_id', $users, null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('horas', 'Horas:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('horas', Input::old('horas'), array('class'=>'form-control', 'placeholder'=>'cobrador')) }}
        </div>
    </div>

	<div class="form-group">
        {{ Form::label('categoria_id', 'Categoría:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::select('categoria_id', $categorias, null, array('class' => 'form-control')) }}
        </div>
    </div>
	
	<div class="form-group">
        {{ Form::label('descripcion', 'Descripción:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::text('descripcion', Input::old('descripcion'), array('class' => 'form-control', 'placeholder'=>'Descripción')) }}
        </div>
    </div>

    <div class="form-group">
	    <label class="col-sm-2 control-label">&nbsp;</label>
	    <div class="col-sm-10">
	      {{ Form::submit('Pagar', array('class' => 'btn btn-lg btn-primary')) }}
	    </div>
	</div>

{{ Form::close() }}

@stop