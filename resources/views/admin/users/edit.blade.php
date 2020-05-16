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
@endsection