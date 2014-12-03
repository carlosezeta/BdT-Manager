@extends('site.layout')

@section('content')

<form id="search-form">
	<input name="search" id="term"> <input type="submit">
</form>
<div id="results"></div>
@stop

@section('scripts')
<script>
	$(function() {
		$("#search-form").on("submit", function(e){
			e.preventDefault();
			var search_term = $("#term").val();
			var display_results = $("#results");
			display_results.html("Cargando...");
			var results = '';
			$.post("search/search", {term: search_term}, function(data) {
				if (data.length == 0) {
					results = 'No hay resultados';
				} else {
					$.each(data, function() {
						results += this.email+'<br>';
					});
				}
				display_results.html(results);
			});
		})
	});
</script>
@stop