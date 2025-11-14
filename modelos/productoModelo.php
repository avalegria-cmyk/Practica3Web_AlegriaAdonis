<?php

class productoModelo extends Modelo {

    public function __construct($id = "") {

        // DEFINIR antes del constructor padre
        $this->nombreAtributos = array("idProducto", "nombre", "cantidad", "precio");
        $this->idNombre        = "idProducto";
        $this->nombreTabla     = "Producto";

        parent::__construct($id); // ahora sí
    }

    public function validarPrecio() {
        return is_numeric($this->precio) && $this->precio > 0;
    }
}