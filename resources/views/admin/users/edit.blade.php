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

    <div class="page-user">
        <div class="row">
            <div class="col-md-4">
                <div class="panel shadow">

                    <div class="header">
                        <h2 class="title">
                            <i class="fas fa-user"></i>
                            Informacion del usuarios
                        </h2>
                    </div>

                    <div class="inside">
                        <div class="mini-profile">

                            @if ( is_null( $user->avatar ) )
                            <img src="{{ asset('images/users/default-avatar.png') }}" alt="user profile" class="avatar">
                            @else
                            <img src="{{ asset('images/users/' . $user->id . '/' . $user->avatar) }}" alt="user profile"
                                class="avatar">
                            @endif
                            <div class="info">
                                <span class="title mt-3">
                                    <i class="fas fa-user"></i>
                                    Nombre :
                                </span>
                                <span>{{ $user->name }} {{ $user->last_name }}</span>
                                <span class="title mt-3">
                                    <i class="fas fa-user-tie"></i>
                                    Estado :
                                </span>
                                <span>{{ getStatusUser( $user->status ) }}</span>
                                <span class="title mt-3">
                                    <i class="fas fa-envelope"></i>
                                    Correo eletrónico :
                                </span>
                                <span>{{ $user->email }}</span>
                                <span class="title mt-3">
                                    <i class="fas fa-calendar-alt"></i>
                                    Fecha de registro :
                                </span>
                                <span>{{ $user->created_at }}</span>
                                <span class="title mt-3">
                                    <i class="fas fa-user-shield"></i>
                                    Rol de usuario :
                                </span>
                                <span>{{ getRoleUser( $user->role ) }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="panel shadow">

                    <div class="header">
                        <h2 class="title">
                            <i class="fas fa-user-edit"></i>
                            Editar usuario
                        </h2>
                    </div>

                    <div class="inside">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection