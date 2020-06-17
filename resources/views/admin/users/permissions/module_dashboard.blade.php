<div class="col-md-4">
    <div class="panel shadow">

        <div class="header">
            <h2 class="title">
                <i class="fas fa-home"></i>
                Modulo Dashboard
            </h2>
        </div>

        <div class="inside">
            <div class="form-check">
                {!! Form::checkbox("dashboard_index", "true", getUserPermission($user->permissions, "admin.index") ,["class" => "form-check-input"]) !!}
                {!! Form::label("dashboard_index", "Puede ver el dashboard", ["class" => "form-check-label"]) !!}
            </div>
        </div>

    </div>
</div>