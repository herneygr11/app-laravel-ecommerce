@extends('layouts.dashboard')

@section('title_page', 'usuarios')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('users.index') }}">
            <i class="fas fa-user"></i>
            Usuarios
        </a>
    </li>
@endsection

@section('content')
<div class="container-fluid">

    <div class="panel shadow">

        <div class="header">
            <h2 class="title">
                <i class="fas fa-user"></i>
                Usuarios
            </h2>
        </div>

        <div class="inside">

            <table class="table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="d-flex">

                            <a href="{{ route('users.edit', ['slug'=>  $user->slug]) }}" class="btn btn-primary mx-1 btn-accion">

                                <i class="fas fa-edit"></i>

                            </a>

                            {!! Form::open( [ 'route' => ['users.delete', 'id' => $user->id, 'method' => 'delete'] ] ) !!}

                                <button class="btn btn-danger mx-1 btn-accion">

                                    <i class="fas fa-trash-alt"></i>

                                </button>

                            {!! Form::close() !!}

                        </td>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection