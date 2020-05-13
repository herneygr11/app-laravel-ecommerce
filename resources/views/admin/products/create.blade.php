@extends('layouts.dashboard')

@section('title_page', 'productos')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('products.index') }}">
        <i class="fas fa-boxes"></i>
        Productos
    </a>
</li>

<li class="breadcrumb-item">
    <a href="{{ route('products.create') }}">
        <i class="fas fa-plus"></i>
        crear productos
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
                    Crear productos
                </h2>

            </div>

        </div>

        <div class="inside">

            {!! Form::open( [ 'route' => 'products.save', 'files' => 'true' ] ) !!}

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        {!! Form::label( 'name', 'Nombre' ) !!}

                        <div class="input-group">

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

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        {!! Form::label( 'category_id', 'Categoria' ) !!}

                        <div class="input-group">

                            <div class="input-group-prepend">

                                <div class="input-group-text">
                                    <i class="fas fa-list"></i>
                                </div>

                            </div>

                            {!! Form::select( 'category_id', $categories, null, [ 'class' => 'form-control' ] ) !!}

                        </div>

                        @error('category_id')
                        <div class="ml-3 pt-1 d-block text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        {!! Form::label( 'file_image', 'Imagen' ) !!}

                        <div class="custom-file">

                            {!! Form::file( 'file_image', [ 'class' => 'custom-file-label', 'id' => "image", 'accept' => 'image/*'] ) !!}
                            {!! Form::label( 'image', 'Imagen', [ 'class' => 'custom-file-label'] ) !!}

                        </div>

                        @error('file_image')
                        <div class="ml-3 pt-1 d-block text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        {!! Form::label( 'price', 'Precio' ) !!}

                        <div class="input-group">

                            <div class="input-group-prepend">

                                <div class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>

                            </div>

                            {!! Form::number( 'price', null, [ 'class' => 'form-control', 'min' => '0.00', 'step' =>
                            'any' ] ) !!}

                        </div>

                        @error('price')
                        <div class="ml-3 pt-1 d-block text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        {!! Form::label( 'in_discount', '¿Esta en descuento?' ) !!}

                        <div class="input-group">

                            <div class="input-group-prepend">

                                <div class="input-group-text">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>

                            </div>

                            {!! Form::select( 'in_discount', [ '0' => 'No', '1' => 'Si'] , 0, [ 'class' => 'form-control' ] ) !!}

                        </div>

                        @error('in_discount')
                        <div class="ml-3 pt-1 d-block text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        {!! Form::label( 'discount', 'Descuento' ) !!}

                        <div class="input-group">

                            <div class="input-group-prepend">

                                <div class="input-group-text">
                                    <i class="fas fa-money-check-alt"></i>
                                </div>

                            </div>

                            {!! Form::number( 'discount', 0, [ 'class' => 'form-control', 'min' => '0.00', 'step' => 'any' ] ) !!}

                        </div>

                        @error('discount')
                        <div class="ml-3 pt-1 d-block text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        {!! Form::label( 'description', 'Descripcion' ) !!}

                        {!! Form::textarea( 'description', null, [ 'class' => 'form-group w-100' ] ) !!}

                        @error('description')
                        <div class="ml-3 pt-1 d-block text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>

    </div>

</div>
@endsection
