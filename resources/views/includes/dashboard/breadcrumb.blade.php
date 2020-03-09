<div class="container-fluid">

    <nav aria-label="breadcrumb shadow">

        <ol class="breadcrumb">

            <li class="breadcrumb-item">

                <a href="{{ route('index') }}">

                    <i class="fas fa-home"></i>
                    Dashboard

                </a>

            </li>

            @section('breadcrumb')
            @show

        </ol>

    </nav>

</div>