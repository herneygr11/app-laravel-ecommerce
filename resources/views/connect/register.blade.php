@extends('layouts.login')

@section('title_page', 'Registrarse')

@section('content')

<div class="box box_register">
    
    <div class="header">
        <a href="{{ route('index') }}">
            <img src="{{ asset('src/img/logo.png') }}" alt="logo">
        </a>
    </div>
    
    <div class="inside">

        {!! Form::open( [ 'route' => 'register'] ) !!}

        <div class="form-group">

            {!! Form::label('name', 'Nombre :') !!}

            <div class="input-group">

                <div class="input-group-prepend">

                    <div class="input-group-text">
                        <i class="fas fa-user"></i>
                    </div>

                </div>

                {!! Form::text( 'name', null, [ 'class' => 'form-control' ] ) !!}

            </div>
            
            @error('name')
                <div class="ml-3 pt-1 d-block text-danger alert-error">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="form-group">

            {!! Form::label('last_name', 'Apellido :') !!}

            <div class="input-group">

                <div class="input-group-prepend">

                    <div class="input-group-text">
                        <i class="fas fa-user-alt"></i>
                    </div>

                </div>

                {!! Form::text( 'last_name', null, [ 'class' => 'form-control' ] ) !!}

            </div>

            @error('last_name')
            <div class="ml-3 pt-1 d-block text-danger">
                {{ $message }}
            </div>
        @enderror

        </div>

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

            @error('email')
            <div class="ml-3 pt-1 d-block text-danger">
                {{ $message }}
            </div>
        @enderror

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

            @error('password')
            <div class="ml-3 pt-1 d-block text-danger">
                {{ $message }}
            </div>
        @enderror

        </div>

        <div class="form-group">

            <label for="confirm_password">Confirmar contraseña:</label>
            <div class="input-group">

                <div class="input-group-prepend">

                    <div class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </div>

                </div>

                {!! Form::password( 'confirm_password', [ 'class' => 'form-control' ] ) !!}

            </div>

            @error('confirm_password')
            <div class="ml-3 pt-1 d-block text-danger">
                {{ $message }}
            </div>
        @enderror

        </div>

        {!! Form::submit('Registrarse', [ 'class' => 'btn btn-success w-100' ]) !!}

        {!! Form::close() !!}

        <div class="footer mt-3">
            <a href="{{ route('login') }}">Ya tengo cuenta, Ingresar</a>
        </div>
        
    </div>

</div>

@endsection