@extends('site.layout')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Taller</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($taller, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('tallers.update', $taller->id))) }}

        <div class="form-group">
            {{ Form::label('titulo', 'Titulo:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('titulo', Input::old('titulo'), array('class'=>'form-control', 'placeholder'=>'Titulo')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('descripcion', 'Descripcion:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('descripcion', Input::old('descripcion'), array('class'=>'form-control', 'placeholder'=>'Descripcion')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('esgrupo', 'Es grupo:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('esgrupo') }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('textorepeticion', 'Texto Repeticion:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('textorepeticion', Input::old('textorepeticion'), array('class'=>'form-control', 'placeholder'=>'Textorepeticion')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('fecha', 'Fecha:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('fecha', Input::old('fecha'), array('class'=>'form-control', 'placeholder'=>'Fecha')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('lugar', 'Lugar:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('lugar', Input::old('lugar'), array('class'=>'form-control', 'placeholder'=>'Lugar')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('img', 'Img:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('img', Input::old('img'), array('class'=>'form-control', 'placeholder'=>'Img')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('tallerista_id', 'Tallerista_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'tallerista_id', Input::old('tallerista_id'), array('class'=>'form-control')) }}
            </div>
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
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('tallers.show', 'Cancel', $taller->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop