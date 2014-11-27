@extends('site.layout')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Tarea</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($tarea, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('tareas.update', $tarea->id))) }}

        <div class="form-group">
            {{ Form::label('titulo', 'Título:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('titulo', Input::old('titulo'), array('class'=>'form-control', 'placeholder'=>'Título de la tarea')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dificultad', 'Dificultad:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::number('dificultad', Input::old('dificultad'), array('class'=>'form-control', 'placeholder'=>'Dificultad estimada de 0 a 10')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('comentario', 'Comentario:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('comentario', Input::old('comentario'), array('class'=>'form-control', 'placeholder'=>'Comentario')) }}
            </div>
        </div>




<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('tareas.show', 'Cancel', $tarea->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop