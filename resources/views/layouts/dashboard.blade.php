<!DOCTYPE html>
<html lang="es">
<head>
    @include('includes.dashboard.head')
</head>
<body>

    <div class="wrapper">

        <div class="col1">
            @include('includes.dashboard.sidebar')
        </div>

        <div class="col2">

            @include('includes.dashboard.navbar')

            <div class="page">

                @include('includes.dashboard.breadcrumb')

                @section('content')
                @show

            </div>

        </div>

    </div>

    <!-- scripts -->
     @include('includes.dashboard.scripts')
    <!-- end  scripts -->

</body>
</html>