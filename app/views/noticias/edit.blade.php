@extends('site.layout')

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'mensaje' );
    </script>
@stop

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Noticia</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($noticia, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('noticias.update', $noticia->id))) }}

        <div class="form-group">
            {{ Form::label('user_id', 'User_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'user_id', Input::old('user_id'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('titulo', 'Titulo:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('titulo', Input::old('titulo'), array('class'=>'form-control', 'placeholder'=>'Titulo')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('entradilla', 'Entradilla:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('entradilla', Input::old('entradilla'), array('class'=>'form-control', 'placeholder'=>'Entradilla')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('mensaje', 'Mensaje:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('mensaje', Input::old('mensaje'), array('class'=>'form-control', 'placeholder'=>'Mensaje')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('slug', 'Slug:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('slug', Input::old('slug'), array('class'=>'form-control', 'placeholder'=>'Slug')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('noticias.show', 'Cancel', $noticia->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop