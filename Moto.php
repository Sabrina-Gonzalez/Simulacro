<?php
/**Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
 incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
 venta y false en caso contrario). */
 class Moto{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $incrementoAnual;
    private $activa;

    //Metodo Constructor
    public function __construct($codigo,$costo,$anioFabricacion,$descripcion,$incrementoAnual,$activa)
    {
        $this->codigo=$codigo;
        $this->costo=$costo;
        $this->anioFabricacion=$anioFabricacion;
        $this->descripcion=$descripcion;
        $this->incrementoAnual=$incrementoAnual;
        $this->activa=$activa;
    }
    //Getters
    public function getCodigo(){
        return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getIncrementoAnual(){
        return $this->incrementoAnual;
    }
    public function getActiva(){
        return $this->activa;
    }
    //Setters
    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }
    public function setCosto($costo){
        $this->costo=$costo;
    }
    public function setAnioFabricacion($anioFabricacion){
        $this->anioFabricacion=$anioFabricacion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
    }
    public function setIncrementoAnual($incrementoAnual){
        $this->incrementoAnual=$incrementoAnual;
    }
    public function setActiva($activa){
        $this->activa=$activa;
    }
    //Metodo toString
    public function __toString()
    {
        return " Codigo: ".$this->getCodigo()."\n".
        " Costo: ".$this->getCosto()."\n".
        " Año de Fabricacion: ".$this->getAnioFabricacion()."\n".
        " Descripcion: ".$this->getDescripcion()."\n".
        " Porcentaje de Incremento Anual: ".$this->getIncrementoAnual()."%\n".
        " Activa: ".$this->getActiva()."\n";
    }

    /**Calcula el valor por el cual puede ser vendida una moto. */
    public function darPrecioVenta(){
        $_venta=-1;
        $_compra=$this->getCosto();
        $anio=date("Y")-$this->getAnioFabricacion();
        $por_inc_anual=$this->getIncrementoAnual();
        if ($this->getActiva()) {
            $_venta=$_compra+$_compra*($anio*$por_inc_anual);
        }
        return$_venta;
    }
 }