@extends('site.layout')

@section('styles')
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@stop
@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>{{ Lang::get('talleres.publicar') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
            </div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'tallers.store', 'class' => 'form-horizontal', 'files' => true)) }}

        <div class="form-group">
            {{ Form::label('titulo', Lang::get('talleres.titulo') , array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('titulo', Input::old('titulo'), array('class'=>'form-control', 'placeholder'=> Lang::get('talleres.titulo') )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('descripcion', Lang::get('talleres.descripcion'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('descripcion', Input::old('descripcion'), array('class'=>'form-control', 'placeholder'=> Lang::get('talleres.descripcion') )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('esgrupo', Lang::get('talleres.esgrupo'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('esgrupo') }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('textorepeticion', Lang::get('talleres.textorepeticion'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('textorepeticion', Input::old('textorepeticion'), array('class'=>'form-control', 'placeholder'=> Lang::get('talleres.textorepeticion2') )) }}
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('fecha', Lang::get('talleres.fecha-horas'), array('class'=>'col-md-2 control-label')) }}

            <div class="col-sm-4">
                <div class='input-group date' id='datepicker'>
                    {{ Form::text('fecha', Input::old('fecha'), array('class'=>'form-control', 'placeholder'=> Lang::get('talleres.fecha'))) }}
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>
            </div>

            <div class="col-sm-3">
                <div class='input-group date' id='timepicker1'>
                    {{ Form::text('hora_inicio', Input::old('hora_inicio'), array('class'=>'form-control', 'placeholder'=> Lang::get('talleres.hora-inicio') )) }}
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>
            </div>

            <div class="col-sm-3">
                <div class='input-group date' id='timepicker2'>
                    {{ Form::text('hora_fin', Input::old('hora_fin'), array('class'=>'form-control', 'placeholder'=> Lang::get('talleres.hora-fin') )) }}
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>
            </div>

        </div>



        <div class="form-group">
            {{ Form::label('lugar', Lang::get('talleres.lugar'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('lugar', Input::old('lugar'), array('class'=>'form-control', 'placeholder'=> Lang::get('talleres.lugar') )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('img', 'Img:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::file('img', array('class'=>'form-control', 'placeholder'=>'Img')) }}
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('tallerista_id', Lang::get('talleres.tallerista'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::select('tallerista_id', $users, null, array('class' => 'form-control')) }}
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('plazas', Lang::get('talleres.plazas'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'plazas', Input::old('plazas'), array('class'=>'form-control')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit( Lang::get('talleres.publicar') , array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}






@stop


@section('scripts')

    <script type="text/javascript" src="{{ asset('js/plugins/moment/moment.min.js') }}"></script>
{{-- Hay que cambiar la linea de abajo para internacionalizacion --}}
    <script type="text/javascript" src="{{ asset('js/plugins/moment/locale/es.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>


        <script type="text/javascript">
            $(function () {
                $('#datepicker').datetimepicker({
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    },
                    pickTime: false
                });
            });

            $(function () {
                $('#timepicker1').datetimepicker({
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    },
                    pickDate: false,
                    minuteStepping: 15
                });
            });

            $(function () {
                $('#timepicker2').datetimepicker({
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    },
                    pickDate: false,
                    minuteStepping: 15
                });
            });


        </script>


@stop
