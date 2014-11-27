@extends('site.layout')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>{{ Lang::get('propuestas.crear') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'propuestas.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('titulo', Lang::get('talleres.titulo'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('titulo', Input::old('titulo'), array('class'=>'form-control', 'placeholder'=>  Lang::get('talleres.titulo') )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('descripcion', Lang::get('talleres.descripcion'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('descripcion', Input::old('descripcion'), array('class'=>'form-control', 'placeholder'=> Lang::get('talleres.descripcion-long') )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('duracion',  Lang::get('talleres.duracion') , array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('duracion', Input::old('duracion'), array('class'=>'form-control', 'placeholder'=> Lang::get('talleres.duracion') )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('espacio', Lang::get('talleres.espacio'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('espacio', Input::old('espacio'), array('class'=>'form-control', 'placeholder'=> Lang::get('talleres.espacio-long') )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('material_alumnos', Lang::get('talleres.material-alumnos') , array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('material_alumnos', Input::old('material_alumnos'), array('class'=>'form-control', 'placeholder'=> Lang::get('talleres.material-alumnos-long') )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('material_bdt', Lang::get('talleres.material-bdt'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('material_bdt', Input::old('material_bdt'), array('class'=>'form-control', 'placeholder'=> Lang::get('talleres.material-bdt-long') )) }}
            </div>
        </div>
        <p>En caso de que los alumnos deban traer material, ¿pueden asistir sin material, como oyentes?</p>
        <div class="form-group">
            {{ Form::label('oyentes', Lang::get('talleres.oyentes'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('oyentes') }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('img', Lang::get('talleres.imagen'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::file('img', array('class'=>'form-control')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit(Lang::get('talleres.proponer'), array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


