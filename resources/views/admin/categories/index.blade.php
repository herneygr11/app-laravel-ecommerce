@extends('layouts.dashboard')

@section('title_page', 'categorias')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('products.index') }}">
        <i class="fas fa-folder-open"></i>
        Categorias
    </a>
</li>
@endsection

@section('content')
<div class="container-fluip">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="panel shadow">

                <div class="header">

                    <div class="d-flex align-items-center justify-content-between">

                        <h2 class="title">
                            <i class="fas fa-folder-open"></i>
                            Agregar categoria
                        </h2>

                    </div>

                </div>

                <div class="inside">
                    {!! Form::open( [ 'route' => 'categories.save' ] ) !!}
                    <div class="form-group">
                        {!! Form::label( 'name', 'Nombre' ) !!}
                        <div class="input-group text-center">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="far fa-keyboard"></i>
                                </div>
                            </div>
                            {!! Form::text( 'name', null, [ 'class' => 'form-control' ] ) !!}
                        </div>

                        @error('name')
                        <div class="ml-3 pt-1 d-block text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label( 'icon', 'ícono' ) !!}
                        <div class="input-group text-center">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-icons"></i>
                                </div>
                            </div>
                            {!! Form::text( 'icon', null, [ 'class' => 'form-control' ] ) !!}
                        </div>

                        @error('icon')
                        <div class="ml-3 pt-1 d-block text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                {!! Form::submit('Guardar', ['class' => 'btn btn-success mx-2 mb-2']) !!}

                {!! Form::close() !!}

            </div>
        </div>
        <div class="col-12 col-md-8">

            <div class="panel shadow">

                <div class="header">

                    <div class="d-flex align-items-center justify-content-between">

                        <h2 class="title">
                            <i class="fas fa-folder-open"></i>
                            Categoris
                        </h2>

                    </div>

                </div>

                <div class="inside">
                    <table class="table">
                        <thead>
                            <tr>
                                <td width="30px">Ícono</td>
                                <td width="65%">Nombre</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td class="text-center">{!! htmlspecialchars_decode( $category->icon ) !!}</td>
                                <td>{{ $category->name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('categories.edit', $category->slug) }}"
                                        class="btn btn-primary mx-1 btn-accion">

                                        <i class="fas fa-edit"></i>

                                    </a>
                                    {!! Form::open( [ 'route' => ['categories.delete', 'id' => $category->id], 'method'
                                    => 'delete'] ) !!}
                                    <button class="btn btn-danger mx-1 btn-accion">

                                        <i class="fas fa-trash-alt"></i>

                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection