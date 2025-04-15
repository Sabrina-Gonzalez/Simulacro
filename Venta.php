<?php
/**Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
 motos y el precio final. */
 class Venta{
    private $numero;
    private $fecha;
    private $obj_Cliente;
    private $obj_Moto;
    private $precio;

    //Metodo Constructor
    public function __construct($numero,$fecha,$obj_Cliente,$obj_Moto,$precio)
    {
        $this->numero=$numero;
        $this->fecha=$fecha;
        $this->obj_Cliente=$obj_Cliente;
        $this->obj_Moto=$obj_Moto;
        $this->precio=$precio;
    }
    //Getters
    public function getNumero(){
        return $this->numero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function get_Obj_Cliente(){
        return $this->obj_Cliente;
    }
    public function get_Obj_Moto(){
        return $this->obj_Moto;
    }
    public function getPrecio(){
        return $this->precio;
    }
    //Setters
    public function setNumero($numero){
        $this->numero=$numero;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function set_Obj_Cliente($obj_Cliente){
        $this->obj_Cliente=$obj_Cliente;
    }
    public function set_Obj_Moto($obj_Moto){
        $this->obj_Moto=$obj_Moto;
    }
    public function setPrecio($precio){
        $this->precio=$precio;
    }
    //Metodo toString
    public function __toString()
    {
        $_motos="• Motos •\n";
        foreach ($this->get_Obj_Moto() as $moto) {
            $_motos.=$moto."\n";
        }
        return "Numero: ".$this->getNumero()."\n".
        "Fecha: ".$this->getFecha()."\n".
        "• Cliente •\n".$this->get_Obj_Cliente().
        $_motos.
        "▪ Precio Final: ".$this->getPrecio()."\n";
    }

    /**Recibe por parámetro un objeto moto y lo
    incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
    vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
    Utilizar el método que calcula el precio de venta de la moto donde crea necesario. */
    public function incorporarMoto($objMoto){
        $true=false;
        $moto=$objMoto->getActiva();
        if ($moto) {
            // Guardo la moto que entra en un array
            $coleccionMotos=$this->get_Obj_Moto(); # Obtengo 
            $coleccionMotos[]=$objMoto; # Almaceno
            $this->set_Obj_Moto($coleccionMotos); # Modifico
            // Actualizacion de la variable precioFinal con la funcion darPrecioVenta
            $precio=$objMoto->darPrecioVenta(); # Obtengo el precio de venta
            $precioFinal=$this->getPrecio()+$precio; # Obtengo el precio final
            $this->setPrecio($precioFinal); # Actualizo el precio final
            $true=true;
        }
        return $true;
    }
 }