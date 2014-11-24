@extends('site.layout')

@section('content')

<h1>All Noticias</h1>

<p>{{ link_to_route('noticias.create', 'Add New Noticia', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($noticias->count())

      @foreach ($noticias as $noticia)
        <div class="pull-right">
        	{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('noticias.destroy', $noticia->id))) }}
            	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
            {{ link_to_route('noticias.edit', 'Edit', array($noticia->id), array('class' => 'btn btn-info')) }}
        </div>
        <h2>{{ $noticia->titulo }}</h2>
        <h4>{{ $noticia->entradilla }}</h2>
        <p>{{ $noticia->mensaje }}</p>
 
        <p>
          <span class="badge">Publicado el {{ $noticia->created_at }}</span>
          
          <span class="pull-right">
            <a class="btn btn-social-icon btn-facebook btn-xs">
              <i class="fa fa-facebook"></i>
            </a>
            <a class="btn btn-social-icon btn-twitter btn-xs">
              <i class="fa fa-twitter"></i>
            </a>
            <a class="btn btn-social-icon btn-google-plus btn-xs">
              <i class="fa fa-google-plus"></i>
            </a>
          </span>
        </p>

        <hr>
      @endforeach

@else
	There are no noticias
@endif

@stop
