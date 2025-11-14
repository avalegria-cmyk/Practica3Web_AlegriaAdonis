<?php
class productoModelo extends Modelo {

    public function __construct($id = "") {
        $this->nombreAtributos = array("idProducto", "nombre", "cantidad", "precio");
        $this->idNombre   = "idProducto";
        $this->nombreTabla = "Producto";

        parent::__construct($id);
    }

    public function validarPrecio() {
        return is_numeric($this->precio) && $this->precio > 0;
    }
}
