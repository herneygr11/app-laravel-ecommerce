<div class="col-md-4">
    <div class="panel shadow">

        <div class="header">
            <h2 class="title">
                <i class="fas fa-boxes"></i>
                Modulo Productos
            </h2>
        </div>

        <div class="inside">
            <div class="form-check">
                {!! Form::checkbox("products_index", "true", getUserPermission($user->permissions, "products.index"),["class" => "form-check-input"]) !!}
                {!! Form::label("products_index", "Puede ver productos", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("products_create", "true", getUserPermission($user->permissions, "products.create"),["class" => "form-check-input"]) !!}
                {!! Form::label("products_create", "Puede crear productos", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("products_edit", "true", getUserPermission($user->permissions, "products.edit"),["class" => "form-check-input"]) !!}
                {!! Form::label("products_edit", "Puede editar productos", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("products_delete", "true", getUserPermission($user->permissions, "products.delete"),["class" => "form-check-input"]) !!}
                {!! Form::label("products_delete", "Puede eliminar productos", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("products_gallery", "true", getUserPermission($user->permissions, "products.gallery"),["class" => "form-check-input"]) !!}
                {!! Form::label("products_gallery", "Puede agregar imagen a la galeria", ["class" => "form-check-label"]) !!}
                <br>
                {!! Form::checkbox("products_gallery_delete", "true", getUserPermission($user->permissions, "products.gallery.delete"),["class" => "form-check-input"]) !!}
                {!! Form::label("products_gallery_delete", "Puede eliminiar imagen de la galeria", ["class" => "form-check-label"]) !!}
            </div>
        </div>

    </div>
</div>