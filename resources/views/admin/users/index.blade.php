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

            <div class="row">
                <div class="col-md-2 offset-md-10">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle w-100" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-filter"></i>
                            Filtrar
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('users.index') }}">
                                <i class="fas fa-stream"></i>
                                <span class="mx-2">Todos</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('users.index', [ 'status'=> 0]) }}">
                                <i class="fas fa-unlink"></i>
                                <span class="mx-2">No verificados</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('users.index', [ 'status'=> 1]) }}">
                                <i class="fas fa-user-check"></i>
                                <span class="mx-2">Verificados</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('users.index', [ 'status'=> 100]) }}">
                                <i class="fas fa-heart-broken"></i>
                                <span class="mx-2">Suspendidos</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table mt-2">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ getStatusUser( $user->status ) }}</td>
                        <td class="d-flex">

                            <a href="{{ route('users.edit', $user->slug) }}"
                                class="btn btn-primary mx-1 btn-accion">

                                <i class="fas fa-edit"></i>

                            </a>

                            {!! Form::open( [ 'route' => ['users.delete', 'id' => $user->id, 'method' => 'delete'] ] )
                            !!}

                            <button class="btn btn-danger mx-1 btn-accion">

                                <i class="fas fa-trash-alt"></i>

                            </button>

                            {!! Form::close() !!}

                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" class="contetet-paginate">{!! $users->render() !!}</td>
                    </tr>
                </tfoot>

            </table>

        </div>

    </div>

</div>
@endsection