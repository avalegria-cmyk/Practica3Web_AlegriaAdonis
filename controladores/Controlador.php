<?php
class Controlador {

    public $accion;
    public $nombreControlador;

    public function llamarAccion($parametros = Array()) {
        $metodo = $this->accion;

        if (method_exists($this, $metodo)) {

            if (empty($parametros)) {
                $this->$metodo();
            } else {
                extract($parametros);
                $this->$metodo($id);
            }

            return true;

        } else {
            return false;
        }
    }

    public function mostrarVista($vista, $parametros = Array()) {
        extract($parametros, EXTR_PREFIX_SAME, "wddx");

        ob_start();
        include "vistas/" . $this->nombreControlador . "/" . $vista . ".php";
        $contenido = ob_get_clean();

        include "vistas/html.php";
        die();
    }
}
