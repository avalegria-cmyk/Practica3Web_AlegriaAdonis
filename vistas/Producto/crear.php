<h3>Crear producto</h3>

<?php
if (isset($error) && $error) {
    echo "<div class='alert alert-danger'>Valida los datos</div>";
}
?>

<form method="post">
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" placeholder="nombre" name="Producto[nombre]">
    </div>

    <div class="form-group">
        <label>Precio</label>
        <input type="number" step="0.01" class="form-control" placeholder="precio" name="Producto[precio]">
    </div>

    <div class="form-group">
        <label>Cantidad</label>
        <input type="number" class="form-control" placeholder="cantidad" name="Producto[cantidad]">
    </div>

    <button type="submit" name="Guardar" class="btn btn-success">
        Crear Producto
    </button>
</form>