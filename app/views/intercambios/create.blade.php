@extends('site.layout')

@section('content')
{{ Form::open(array('route' => 'intercambios.store', 'class' => 'form-horizontal')) }}

    <div class="form-group">
        {{ Form::label('cobrador_id', 'Pagar a:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('cobrador_id', Input::old('cobrador_id'), array('class'=>'form-control', 'placeholder'=>'cobrador')) }}
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
          {{ Form::select('categoria_id', $categorias) }}
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