@extends('layouts.email')

@section('content')
    <p>
        Hola: <strong>{{ $user->name }} {{ $user->last_name }}</strong>
        <p>
            Este es un correo electrónico que le ayudara a reestablecer la contraseña de su cuenta en nuestra platadorma. 
        </p>
        <p>
            Para continuar haga clic en el siguiente boton e ingrese el siguiente codigo :
            <h3>{{ $code }}</h3>
        </p>

        <p>
            <a 
                href="{{ route('recover.index', ['email' => $user->email]) }}"
                class="btn btn-primary"
                style="
                    background-color: #2caaff;
                    color: #fff;
                    padding: 12px;
                    border-radius: 4px;
                    text-decoration: none;
                "
            >
                Resetear mi contraseña
            </a>
            <p>Si el boton anterior no le funciona, copie y peque la siguiente url en su navegador</p>
            <p>{{ route('recover.index', ['email' => $user->email]) }}</p>
        </p>
    </p>
@endsection