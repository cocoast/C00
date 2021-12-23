
@extends('adminlte::page')

@section('title', 'Add Clase')

@section('content_header')
    <h1>Crear una Clase</h1>
@stop

@section('content')
 <form action="/clase" method="POST">
	@csrf
	<div class="mb-3">
		<label for="" class="form-label">Nombre de la Clase</label>
		<input id="clase" name="clase" type="text" tabindex="1" class="form-control">
	</div>
	<a href="/clase" class="btn btn-secondary" tabindex="2">CANCELAR</a>
	<button  class="btn btn-primary" tabindex="3">GUARDAR</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop