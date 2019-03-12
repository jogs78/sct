@extends('template.main')

@section('title', 'Iniciar sesión')

@section('contenido')

<div class="col-sm-12">
    <h3><strong>Sistema de Gestión del Almacén</strong></h3>
    <div class="mydescription">
        <h4></h4>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 col-sm-offset-3 myform-cont" >
        <div class="myform-top">
            <div class="myform-top-left">
                <p>Inicio de sesión</p>
                <p>Ingrese sus datos de acceso</p>
            </div>
            <div class="myform-top-right">
                <i class="fa fa-key"></i>
            </div>
        </div>
        <div class="myform-bottom">
            
            {!!Form::open(['route' => 'login', 'method' => 'POST']) !!}
                {{ csrf_field() }}
            
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="text" name="email" placeholder="Ingresa tu correo electronico..." class="form-control" id="email" value="{{ old('email') }}">
                    {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" placeholder="Ingresa tu contraseña..." class="form-control" id="password">
                    {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                </div>
                <button class="mybtn">Ingresar <span class="glyphicon glyphicon-log-in"></span> </button>
        
            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection