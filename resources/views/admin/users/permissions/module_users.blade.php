<div class="col-md-4">
    <div class="panel shadow">

        <div class="header">
            <h2 class="title">
                <i class="fas fa-user"></i>
                Persimos Usuario
            </h2>
        </div>

        <div class="inside">
            <div class="form-check">
                {!! Form::checkbox("users_index", "true", getUserPermission($user->permissions, "users.index"), ["class" => "form-check-input"]) !!}
                {!! Form::label("users_index", "Puede ver usuarios", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("users_edit", "true", getUserPermission($user->permissions, "users.edit"), ["class" => "form-check-input"]) !!}
                {!! Form::label("users_edit", "Puede editar usuarios", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("users_permissions", "true", getUserPermission($user->permissions, "users.permissions"), ["class" => "form-check-input"]) !!}
                {!! Form::label("users_permissions", "Puede ver permisos de usuario", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("users_permissions_create", "true", getUserPermission($user->permissions, "users.permissions"), ["class" => "form-check-input"]) !!}
                {!! Form::label("users_permissions_create", "Puede crear permiso de usuario", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("users_edit", "true", getUserPermission($user->permissions, "users.edit"), ["class" => "form-check-input"]) !!}
                {!! Form::label("users_edit", "Puede editar usuario", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("users_delete", "true", getUserPermission($user->permissions, "users.delete"), ["class" => "form-check-input"]) !!}
                {!! Form::label("users_delete", "Puede eliminar usuario", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("users_banned", "true", getUserPermission($user->permissions, "users.banned"), ["class" => "form-check-input"]) !!}
                {!! Form::label("users_banned", "Puede Bannear usuario", ["class" => "form-check-label"]) !!}
            </div>
        </div>

    </div>
</div>