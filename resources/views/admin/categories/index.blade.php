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