<div class="col-md-4">
    <div class="panel shadow">

        <div class="header">
            <h2 class="title">
                <i class="fas fa-folder-open"></i>
                Modulo Categorias
            </h2>
        </div>

        <div class="inside">
            <div class="form-check">
                {!! Form::checkbox("categories_index", "true", getUserPermission($user->permissions, "categories.index"),["class" => "form-check-input"]) !!}
                {!! Form::label("categories_index", "Puede ver categorias", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("categories_create", "true", getUserPermission($user->permissions, "categories.create"),["class" => "form-check-input"]) !!}
                {!! Form::label("categories_index", "Puede crear categorias", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("categories_edit", "true", getUserPermission($user->permissions, "categories.edit"),["class" => "form-check-input"]) !!}
                {!! Form::label("categories_edit", "Puede editar categorias", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("categories_delete", "true", getUserPermission($user->permissions, "categories.delete"),["class" => "form-check-input"]) !!}
                {!! Form::label("categories_delete", "Puede eliminar categorias", ["class" => "form-check-label"]) !!}
                <br>
            </div>
        </div>

    </div>
</div>