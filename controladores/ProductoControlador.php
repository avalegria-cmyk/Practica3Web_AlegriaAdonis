<?php
require_once "modelos/productoModelo.php";

class ProductoControlador extends Controlador {

    // Cada función representa una URL
    function crear() {

        $modelo = new productoModelo();

        if (isset($_POST["Producto"]) && !empty($_POST["Producto"])) {

            $modelo->setAtributos($_POST["Producto"]);

            if ($modelo->validar()) {
                $modelo->insertar();
                $this->mostrarVista("exito");
            } else {
                $this->mostrarVista("crear", array("error" => true));
            }
        } else {
            $this->mostrarVista("crear");
        }
    }

    function actualizar($id) {

        $modelo = new productoModelo($id);

        if (isset($_POST["Producto"]) && !empty($_POST["Producto"])) {

            $modelo->setAtributos($_POST["Producto"]);

            if ($modelo->validar()) {
                $modelo->actualizar();
                $this->mostrarVista("exito");
            } else {
                $this->mostrarVista("actualizar", array(
                    "modelo" => $modelo,
                    "error"  => true
                ));
            }
        } else {

            if (!empty($modelo->atributos)) {
                $this->mostrarVista("actualizar", array(
                    "modelo" => $modelo
                ));
            } else {
                echo "No existe el producto";
            }
        }
    }

    function todo() {
        $modelo = new productoModelo();
        $this->mostrarVista("todo", array("resultados" => $modelo->consultarTodo()));
    }

    function eliminar($id) {
        $modelo = new productoModelo($id);

        if (!empty($modelo->atributos)) {
            $modelo->eliminar();
            exit(json_encode(array("ok" => "Producto eliminado")));
        } else {
            exit(json_encode(array("error" => "No existe el producto")));
        }
    }
}
