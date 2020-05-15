<div class="sidebar shadow">

    <div class="section-top">
        <div class="logo">
            <img src="{{ asset('src/img/logo.png') }}" alt="img-fluid">
        </div>

        <div class="user">
            <div class="name">
                {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                <a href="{{ route('logout') }}" data-toggle="tooltip" data-placement="top" title="Salir">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            <div class="email">
                {{ Auth::user()->email }}
            </div>
        </div>
    </div>

    <div class="main">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}" class="lk-dashboard"> <i class="fas fa-home"></i>Dashboard</a>
            </li>
            <li>
                <a href="{{ route('users.index') }}" class="lk-user"> <i class="fas fa-user"></i>Usuarios</a>
            </li>
            <li>
                <a href="{{ route('products.index') }}" class="lk-product"> <i class="fas fa-boxes"></i>Productos</a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}" class="lk-category"> <i class="fas fa-folder-open"></i>Categorias</a>
            </li>
        </ul>
    </div>
</div>