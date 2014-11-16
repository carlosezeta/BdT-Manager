@extends('site.layout')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Proponer Taller</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

<div class="row">
    {{ Form::open(array('route' => 'tallers.store', 'class' => 'form-horizontal', 'files' => true)) }}

        <div class="form-group">
            {{ Form::label('titulo', 'Título:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('titulo', Input::old('titulo'), array('class'=>'form-control', 'placeholder'=>'Titulo')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('descripcion', 'Descripción:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('descripcion', Input::old('descripcion'), array('class'=>'form-control', 'placeholder'=>'Descripcion')) }}
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('img', 'Imagen:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::file('img', array('class'=>'form-control', 'placeholder'=>'Img')) }}
            </div>
        </div>

        <div class="hidden">
          {{ Form::input('number', 'tallerista_id', Session::get('userId')) }}
        </div>

        <div class="form-group">
            {{ Form::label('plazas', 'Plazas:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'plazas', Input::old('plazas'), array('class'=>'form-control')) }}
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-10">
              {{ Form::submit('Proponer Taller', array('class' => 'btn btn-lg btn-primary')) }}
            </div>
        </div>

    {{ Form::close() }}
</div>

@stop


