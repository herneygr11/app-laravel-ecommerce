@extends('layouts.login')

@section('title_page', 'Login')

@section('content')

<div class="box box_login">

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
            
            {!! Form::email( 'password', null, [ 'class' => 'form-control' ] ) !!}
            
        </div>

    </div>

    {!! Form::submit('Ingresar', [ 'class' => 'btn btn-success w-100' ]) !!}

    {!! Form::close() !!}

</div>

@endsection