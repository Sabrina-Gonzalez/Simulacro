<?php
/**Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
 documento. */
class Cliente{
    private $nombre;
    private $apellido;
    private $estado;
    private $tipo;
    private $documento;

    //Metodo Constructor
    public function __construct($nombre,$apellido,$estado,$tipo,$documento)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->estado=$estado;
        $this->tipo=$tipo;
        $this->documento=$documento;
    }

    //Getters
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getDocumento(){
        return $this->documento;
    }
    //Setters
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setEstado($estado){
        $this->estado=$estado;
    }
    public function setTipo($tipo){
        $this->tipo=$tipo;
    }
    public function setDocumento($documento){
        $this->documento=$documento;
    }
    //Metodo toString
    public function __toString()
    {
        return "Nombre: ".$this->getNombre()."\n".
        "Apellido: ".$this->getApellido()."\n".
        "Tipo Documento: ".$this->getTipo().", Numero: ".$this->getDocumento()."\n".
        "Estado: ".$this->getEstado()."\n";
    }
}