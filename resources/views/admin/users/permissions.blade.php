@extends('layouts.dashboard')

@section('title_page', 'usuarios')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('users.index') }}">
        <i class="fas fa-user"></i>
        Usuarios
    </a>
</li>
<li class="breadcrumb-item">
    <a href="#">
        <i class="fas fa-users"></i>
        Permisos
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-user">
        {!! Form::open(['route' => ['users.permissions', $user->id], 'methos' => 'POST']) !!}
        <div class="row">
            @include('admin.users.permissions.module_dashboard')
            @include('admin.users.permissions.module_products')
            @include('admin.users.permissions.module_categories')
        </div>

        <div class="row mt-4">
            @include('admin.users.permissions.module_users')
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="panel shadow">
                    <div class="inside">
                        {!! Form::submit('Guardar', ["class" => "btn btn-primary"]) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection