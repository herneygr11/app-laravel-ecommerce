@extends('layouts.login')

@section('title_page', 'Login')

@section('content')

<div class="box box_login">
    
    <div class="header">
        <a href="{{ route('index') }}">
            <img src="{{ asset('src/img/logo.png') }}" alt="logo">
        </a>
    </div>
    
    <div class="inside">

        {!! Form::open( [ 'route' => 'login'] ) !!}

        <div class="form-group">

            {!! Form::label('email', 'Correo eletrónico :') !!}

            <div class="input-group">

                <div class="input-group-prepend">

                    <div class="input-group-text">
                        <i class="far fa-envelope-open"></i>
                    </div>

                </div>

                {!! Form::email( 'email', null, [ 'class' => 'form-control' ] ) !!}

            </div>

        </div>

        <div class="form-group">

            <label for="password">Contraseña:</label>
            <div class="input-group">

                <div class="input-group-prepend">

                    <div class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </div>

                </div>

                {!! Form::password( 'password', [ 'class' => 'form-control' ] ) !!}

            </div>

        </div>

        {!! Form::submit('Ingresar', [ 'class' => 'btn btn-success w-100' ]) !!}

        {!! Form::close() !!}

        <div class="footer mt-3">
            <a href="{{ route('register') }}">¿No tienes una cuenta?, Registrate</a>
            <a href="#">Recuperar contraseña</a>
        </div>
        
    </div>

</div>

@endsection