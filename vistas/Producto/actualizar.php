<h3>Actualizar producto ID <?php echo $modelo->id ?></h3>

<?php
if (isset($error) && $error) {
    echo "<div class='alert alert-danger'>Valida los datos</div>";
}
?>

<form method="post">
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" value="<?php echo $modelo->nombre ?>" placeholder="nombre"
            name="Producto[nombre]">
    </div>

    <div class="form-group">
        <label>Precio</label>
        <input type="number" step="0.01" class="form-control" value="<?php echo $modelo->precio ?>" placeholder="precio"
            name="Producto[precio]">
    </div>

    <div class="form-group">
        <label>Cantidad</label>
        <input type="number" class="form-control" value="<?php echo $modelo->cantidad ?>" placeholder="cantidad"
            name="Producto[cantidad]">
    </div>

    <button type="submit" name="Guardar" class="btn btn-primary">
        Guardar Producto
    </button>
</form>