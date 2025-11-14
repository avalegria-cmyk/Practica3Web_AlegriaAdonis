<?php
require_once "controladores/Controlador.php";
require_once "modelos/Modelo.php";

if ($_SERVER["REQUEST_URI"] != null) {

    // ruta del servidor
    $URL_SERVER = explode("index.php/", $_SERVER["REQUEST_URI"])[0];
    $GLOBALS["URL_SERVER"] = $URL_SERVER;

    // obtener el controlador desde la URL
    $recursos = explode(".php/", $_SERVER["REQUEST_URI"]);
    $recursos = explode("/", isset($recursos[1]) ? $recursos[1] : $recursos[0]);

    $accion = "";
    $recursos[1] = (isset($recursos[1])) ? $recursos[1] : "home";

    if (!empty($_GET)) {
        $recursos[1] = explode("?", $recursos[1])[0];
    }

    $accion = $recursos[1];

    // nombre del controlador
    $nombre = (isset($recursos[0])) ? $recursos[0] : "inicio";
    $nombre = ucfirst($nombre);

    require_once "controladores/{$nombre}Controlador.php";
    $tipo = $nombre . "Controlador";

    // crear controlador
    $controlador = new $tipo;
    $controlador->accion = $accion;
    $controlador->nombreControlador = $nombre;

    // enviar parametros al controlador
    $parametros = (!empty($_GET)) ? $_GET : Array();
    $llamado = $controlador->llamarAccion($parametros);

    if (!$llamado) {
        echo "Ruta no encontrada.";
    }

} else {
    echo "No hay ruta valida.";
}
