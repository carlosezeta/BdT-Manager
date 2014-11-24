@extends('site.layout')

@section('content')

<h1>Show Noticia</h1>

<p>{{ link_to_route('noticias.index', 'Return to All noticias', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

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

@stop
