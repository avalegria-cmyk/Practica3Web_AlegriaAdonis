<?php
require_once "Conexion.php";

class Modelo {

    public $idNombre = "id";
    public $atributos = [];
    public $id;
    public $nombreAtributos = [];
    protected $nombreTabla = "producto";
    protected $conexion;

    function __construct($id = "") {

        $this->conexion = new Conexion();
        $this->nombreTabla = ucfirst($this->nombreTabla);

        if ($id != "") {
            $this->id = $id;
            $this->consultar();
        }
    }

    public function setAtributos($modelo) {
        $this->atributos = $modelo;

        if (!empty($modelo)) {
            foreach ($modelo as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    public function validar() {
        $noError = true;

        foreach ($this->atributos as $key => $value) {
            if (empty($value)) {
                $noError = false;
            }
        }

        return $noError;
    }

    public function insertar() {
        $campos  = implode(",", $this->nombreAtributos);
        $valores = $this->valores();

        $sql = "insert into {$this->nombreTabla} ({$campos}) values({$valores})";

        $this->conexion->abrir();
        $this->conexion->ejecutar($sql);
    }

    public function actualizar() {
        $set = $this->valoresActualizar();

        $sql = "update {$this->nombreTabla} set {$set} where {$this->idNombre} = {$this->id}";

        $this->conexion->abrir();
        $this->conexion->ejecutar($sql);
    }

    public function eliminar() {
        $sql = "delete from {$this->nombreTabla} where {$this->idNombre} = {$this->id}";

        $this->conexion->abrir();
        $this->conexion->ejecutar($sql);
    }

    public function consultar() {
        $campos = implode(",", $this->nombreAtributos);
        $sql = "select {$campos} from {$this->nombreTabla} where {$this->idNombre} = '" . $this->id . "'";

        $this->conexion->abrir();
        $this->conexion->ejecutar($sql);
        $this->setAtributos($this->conexion->extraerModelo());
    }

    public function consultarTodo() {
        $campos = implode(",", $this->nombreAtributos);
        $sql = "select {$campos} from {$this->nombreTabla}";

        $this->conexion->abrir();
        $this->conexion->ejecutar($sql);

        $filas = $this->conexion->numFilas();
        $registros = array();

        for ($i = 0; $i < $filas; $i++) {
            $datos = $this->conexion->extraerModelo();
            $registros[$i] = new self;
            $registros[$i]->setAtributos($datos);
        }

        return $registros;
    }

    private function valoresActualizar() {
        $valores = array();

        foreach ($this->atributos as $nombre => $value) {
            $valores[] = "$nombre = '" . $value . "'";
        }

        return implode(",", $valores);
    }

    private function valores() {
        $valores = array();

        foreach ($this->atributos as $key => $value) {
            $valores[] = "'$value'";
        }

        return implode(",", $valores);
    }
}
