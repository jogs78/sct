@extends('template.aux')

@section('title', 'Inicio')

@section('contenido')

<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/inicio.css') }}">

	<div class="col-md-12">
    	<ol class="breadcrumb breadcrumb-arrow">
        	<li class="action"><span>Inicio</span></li>          
        </ol>
    </div>

	<h1><strong>Sistema de Gestión del Almacén</strong></h2>
	<h3>Bienvenido {{ auth()->user()->name }}</h3>
	<div class="img-center">
		<img src="{{ asset('plugins/bootstrap/img/buen.png') }}" class="img-al" alt="almacen" style="width:450px;height:350px;">
	</div>

@endsection