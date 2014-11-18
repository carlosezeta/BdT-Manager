@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Propuestas</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($propuestas, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('propuestas.update', $propuestas->id))) }}

        <div class="form-group">
            {{ Form::label('tallerista_id', 'Tallerista_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'tallerista_id', Input::old('tallerista_id'), array('class'=>'form-control')) }}
            </div>
        </div>

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
            {{ Form::label('duracion', 'Duracion:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('duracion', Input::old('duracion'), array('class'=>'form-control', 'placeholder'=>'Duracion')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('min_asistentes', 'Min_asistentes:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'min_asistentes', Input::old('min_asistentes'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('max_asistentes', 'Max_asistentes:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'max_asistentes', Input::old('max_asistentes'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('espacio', 'Espacio:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('espacio', Input::old('espacio'), array('class'=>'form-control', 'placeholder'=>'Espacio')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('material_alumnos', 'Material_alumnos:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('material_alumnos', Input::old('material_alumnos'), array('class'=>'form-control', 'placeholder'=>'Material_alumnos')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('material_bdt', 'Material_bdt:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('material_bdt', Input::old('material_bdt'), array('class'=>'form-control', 'placeholder'=>'Material_bdt')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('oyentes', 'Oyentes:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('oyentes') }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('img', 'Img:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('img', Input::old('img'), array('class'=>'form-control', 'placeholder'=>'Img')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('propuestas.show', 'Cancel', $propuestas->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop