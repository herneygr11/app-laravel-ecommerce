@extends('layouts.dashboard')

@section('title_page', 'productos')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('products.index') }}">
            <i class="fas fa-boxes"></i>
            Productos
        </a>
    </li>
@endsection

@section('content')
<div class="container-fluid">

    <div class="panel shadow">

        <div class="header">

            <div class="d-flex align-items-center justify-content-between">

                <h2 class="title">
                    <i class="fas fa-boxes"></i>
                    Productos
                </h2>

                <a href="{{ route('products.create') }}" class="btn btn-primary btn-accion mx-2">
                    <i class="fas fa-plus"></i>
                </a>

            </div>

        </div>

        <div class="inside">

            <table class="table">

            </table>

        </div>

    </div>

</div>
@endsection