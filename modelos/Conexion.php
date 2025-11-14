<?php
class Conexion {

    private $host = "localhost";
private $usuario = "root";
private $password = "123456";
private $basedatos = "almacen_mvc";


    private $conexion;
    public $resultado;

    public function abrir() {
        if (!$this->conexion) {
            $this->conexion = new mysqli(
                $this->host,
                $this->usuario,
                $this->password,
                $this->basedatos
            );

            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }
        }
    }

    public function ejecutar($sql) {
        $this->resultado = $this->conexion->query($sql);
        if ($this->resultado === false) {
            die("Error en la consulta: " . $this->conexion->error);
        }
    }

    public function numFilas() {
        return $this->resultado ? $this->resultado->num_rows : 0;
    }

    public function extraerModelo() {
        return $this->resultado->fetch_array(MYSQLI_ASSOC);
    }

    public function cerrar() {
        if ($this->conexion) {
            $this->conexion->close();
            $this->conexion = null;
        }
    }
}
