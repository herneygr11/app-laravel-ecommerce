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

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td @if ( $product->status == 0 ) class="table-danger" @endif> {{ $product->id }} </td>
                        <td>
                            <a 
                                data-fancybox="gallery"
                                href="{{ asset($product->image_path . '/m_' . $product->image) }}"
                            >
                                <img src="{{ asset($product->image_path . '/m_' . $product->image) }}" width="64" alt="{{ $product->name }}" >
                            </a>
                        </td>
                        <td> {{ $product->name }} </td>
                        <td> {{ $product->category->name }} </td>
                        <td> {{ $product->price }} </td>
                        <td class="d-flex">

                            <a href="{{ route('products.edit', ['slug' =>  $product->slug]) }}"
                                class="btn btn-primary mx-1 btn-accion">

                                <i class="fas fa-edit"></i>

                            </a>

                            {!! Form::open( [ 'route' => ['products.delete', 'id' => $product->id, 'method' => 'delete']
                            ] ) !!}

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
                        <td colspan="6" class="contetet-paginate">{!! $products->render() !!}</td>
                    </tr>
                </tfoot>
            </table>

        </div>

    </div>

</div>
@endsection