<?php
/**Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
 motos y la colección de ventas realizadas. */
 class Empresa{
    private $denominacion;
    private $direccion;
    private $clientes;
    private $motos;
    private $ventas;

    //Metodo Constructor
    public function __construct($denominacion,$direccion,$clientes,$motos,$ventas)
    {
        $this->denominacion=$denominacion;
        $this->direccion=$direccion;
        $this->clientes=$clientes;
        $this->motos=$motos;
        $this->ventas=$ventas;
    }
    //Getters
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getClientes(){
        return $this->clientes;
    }
    public function getMotos(){
        return $this->motos;
    }
    public function getVentas(){
        return $this->ventas;
    }
    //Setters
    public function setDenominacion($denominacion){
        $this->denominacion=$denominacion;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }
    public function setClientes($clientes){
        $this->clientes=$clientes;
    }
    public function setMotos($motos){
        $this->motos=$motos;
    }
    public function setVentas($ventas){
        $this->ventas=$ventas;
    }
    //Metodo toString
    public function __toString()
    {
        $clientes="--------Clientes--------\n";
        foreach($this->getClientes() as $cliente){
            $clientes.= $cliente."\n";   
        }
        $motos="-----------Motos-----------\n";
        foreach ($this->getMotos() as $moto) { 
            $motos.="▪ ".$moto."\n";   
        }
        $ventas="----------Ventas-----------\n";
        foreach ($this->getVentas() as $venta) { 
            $ventas.= $venta."\n";
        }
        return "--------------EMPRESA---------------\n".
        "Denominacion: ".$this->getDenominacion()."\n".
        "Direccion: ".$this->getDireccion()."\n".
        $clientes.
        $motos.
        $ventas;
    }

    /**Recorre la colección de motos de la Empresa y
    retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro. */
    public function retornarMoto($codigoMoto){
        $referencia=false;
        $motos=$this->getMotos();
        $i=0;
        while ($i<count($motos) && !$referencia) {
            $moto=$motos[$i];
            if ($moto->getCodigo()==$codigoMoto) {
                $referencia=$moto;
            }
            $i++;
        }
        return $referencia;
    }
    
    /** Recibe por parámetro una colección de códigos de motos, la cual es recorrida, 
     *y por cada elemento de la colección se busca el objeto moto correspondiente al código 
     *y se incorpora a la colección de motos de la instancia Venta que debe ser creada.
     *El método debe setear los variables instancias de venta que corresponda y retornar el importe final de laventa. */
    public function registrarVenta($colCodigosMoto,$objCliente){
        $colMotos=array();
        $precioFinal=0;
         // Verificamos que el cliente esté habilitado para comprar
        if ($objCliente->getEstado()) {
            // Recorremos cada código de moto enviado
            foreach ($colCodigosMoto as $codigoMoto) {
                 // obtengo el obj moto correspondiente al codigo
                $moto=$this->retornarMoto($codigoMoto);
                if ($moto!=null && $moto->getActiva()) {
                    array_push($colMotos,$moto);
                }
            }
            if (count($colMotos)>0) {// tengo motos para vender
                $numero=count($this->getVentas())+1;
                $venta=new Venta($numero,date("j, n, Y"),$objCliente,[],$precioFinal);
                foreach ($colMotos as $moto) {
                    $venta->incorporarMoto($moto);
                }
                $precioFinal=$venta->getPrecio();
                $ventas=$this->getVentas();
                array_push($ventas,$venta);
                $this->setVentas($ventas);
            }
        }
        return $precioFinal;
    }

    /** recibe por parámetro el tipo y
    *número de documento de un Cliente 
    *y retorna una colección con las ventas realizadas al cliente */
    public function retornarVentasXCliente($tipo,$numDoc){
        $coleccion=array();
        foreach ($this->getVentas() as $venta){
            $cliente=$venta->get_Obj_Cliente();
            if ($cliente->getTipo()==$tipo && $cliente->getDocumento()==$numDoc) {
                array_push($coleccion,$venta);
            }
        }
        return $coleccion;
    }
 }