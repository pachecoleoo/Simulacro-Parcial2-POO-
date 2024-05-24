<?php
// En la clase Empresa:
// 1. Implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por la
// empresa y retorna el importe total de ventas Nacionales realizadas por la empresa.🟢
// 2. Implementar el método informarVentasImportadas() que recorre la colección de ventas realizadas por la empresa y
// retorna una colección de ventas de motos importadas. Si en la venta al menos una de las motos es importada la
// venta debe ser informada.🔴
// (*IMPORTANTE: invocar a los métodos implementados en la clase venta cuando crea necesario)
class Empresa
{
    private $denominacion;
    private $direccion;
    private $coleccionClientes;
    private $coleccionMotos;
    private $coleccionVentas;

    public function __construct($denominacion, $direccion, array $coleccionClientes, array $coleccionMotos,   array $coleccionVentas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionClientes = $coleccionClientes;
        $this->coleccionMotos = $coleccionMotos;
        $this->coleccionVentas = $coleccionVentas;
    }

    /**
     * Obtiene el valor de denominacion
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Setea el valor de denominacion
     *
     * @return  self
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    /**
     * Obtiene el valor de coleccionClientes
     */
    public function getColeccionClientes()
    {
        return $this->coleccionClientes;
    }

    /**
     * Setea el valor de coleccionClientes
     *
     * @return  self
     */
    public function setColeccionClientes($coleccionClientes)
    {
        $this->coleccionClientes = $coleccionClientes;
    }

    /**
     * Obtiene el valor de direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Setea el valor de  direccion
     *
     * @return  self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * Obtiene el valor de coleccionMotos
     */
    public function getColeccionMotos()
    {
        return $this->coleccionMotos;
    }

    /**
     * Setea el valor de coleccionMotos
     *
     * @return  self
     */
    public function setColeccionMotos($coleccionMotos)
    {
        $this->coleccionMotos = $coleccionMotos;
    }

    /**
     * Obtiene el valor de coleccionVentas
     */
    public function getColeccionVentas()
    {
        return $this->coleccionVentas;
    }

    /**
     * Setea el valor de coleccionVentas
     *
     * @return  self
     */
    public function setColeccionVentas($coleccionVentas)
    {
        $this->coleccionVentas = $coleccionVentas;
    }
    /**
     * 5)  Metodo que recorre la colección de motos de la Empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
     * @param int $codigoMoto 
     * @return objeto  
     */
    public function retornarMoto($codigoMoto)
    {
        $objMoto = null;
        $coleccionMotos = $this->getColeccionMotos();
        $i = 0;
        while ($i < count($coleccionMotos) && $objMoto == null) {
            $codigoXmoto = $coleccionMotos[$i]->getCodigo();
            if ($codigoXmoto == $codigoMoto) {
                $objMoto = $coleccionMotos[$i];
            }
            $i++;
        }



        return $objMoto;
    }

    /**
     * 6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por, parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colecció se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia Venta que debe ser creada. El método debe setear los variables instancias de venta que corresponda y retornar el importe final de lA venta.Recordar que no todos los clientes ni todas las motos, están disponibles para registrar una venta en un momento determinado.
     */
    public function registrarVenta($colCodigosMotos, $objCliente)
    {



        $motosTotal = [];
        $precioFinal = 0;
        $estadoPersona = $objCliente->getEstado();
        $cantidadMotos = Count($this->getColeccionMotos());

        while ($estadoPersona) { //primero si puede comprar la persona. 

            foreach ($colCodigosMotos as $codigoMoto) { //DESGLOSAMOS LOS CODIGOS DE LAS MOTOS

                for ($j = 0; $j < $cantidadMotos; $j++) {

                    $motoColeccion = $this->getColeccionMotos()[$j];
                    $estadoMoto = $motoColeccion->getActiva();

                    if ($codigoMoto == $motoColeccion->getCodigo() && $estadoMoto) {

                        $motosTotal[] =   $motoColeccion;
                        $precioFinal += $motoColeccion->darPrecioVenta();
                    }
                }
            }
            $estadoPersona = false;
        }
        $numero = count($this->getColeccionVentas());
        $venta = new Venta($numero, date('Y-m-d'), $objCliente, $motosTotal, $precioFinal);



        // Actualizar la colección de ventas si hay una venta
        if ($venta <> null) {
            $ventas = $this->getColeccionVentas();
            $ventas[] = $venta;
            $this->setColeccionVentas($ventas);
        }

        return $venta;
    }
    /** 
     * 7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
     */

    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $coleccionVentas = $this->getColeccionVentas();
        $ventasCliente = [];
        $u = 0;
        $i = 0;

        // busqueda del cliente a traves de los parametros recibido
        for ($i; $i < count($coleccionVentas); $i++) {

            // verifica si tipo y nro dni son correcto
            if (($coleccionVentas[$i]->getObjCliente()->getTipo() ==  $tipo) && ($coleccionVentas[$i]->getObjCliente()->getDoc() == $numDoc)) {

                // se va almacenando cada compra que realizo el cliente
                $ventasCliente[] = $coleccionVentas[$i];
            }
        }

        // retorna una colección con las ventas realizadas al cliente.
        return $ventasCliente;
    }

    //  1. Implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por la
    // empresa y retorna el importe total de ventas Nacionales realizadas por la empresa.🟢
    public function informarSumaVentasNacionales()
    {
        $coleccionVentas = $this->getColeccionVentas();
        $sumaTotalDeVentasNacionales = 0;
        foreach ($coleccionVentas as $venta) {
            $venta1  = $venta->retornarTotalVentaNacional();
            $sumaTotalDeVentasNacionales = $venta1 + $sumaTotalDeVentasNacionales;
        }

        return $sumaTotalDeVentasNacionales;
    }
    // 2. Implementar el método informarVentasImportadas() que recorre la colección de ventas realizadas por la empresa y
    // retorna una colección de ventas de motos importadas. Si en la venta al menos una de las motos es importada la
    // venta debe ser informada.🔴
    // (*IMPORTANTE: invocar a los métodos implementados en la clase venta cuando crea necesario)
    public function  informarVentasImportadas()
    {
        $coleccionVentas = $this->getColeccionVentas();
        $motosImportadasPorVentasTotal = [];
        foreach ($coleccionVentas as $venta) {
            $motosImportadas = $venta->retornarMotosImportadas();
            $motosImportadasPorVentasTotal[] = $motosImportadas;
        }
        if ($motosImportadasPorVentasTotal <> null) {
            $msj =  $this->convertirArray($motosImportadasPorVentasTotal);
        } else $msj = "No Hubieron venta de motos importadas";

        return $msj;
    }


    public function convertirArray($array)
    {
        $cadena = "";
        foreach ($array as $objeto) {
            $cadena .= $objeto;
            $cadena .= "\n";
        }
        return $cadena;
    }

    public function __toString()
    {   // arrays
        $clientes = $this->getColeccionClientes();
        $motos = $this->getColeccionMotos();
        $ventas = $this->getColeccionVentas();

        $respuesta = "";
        // presentacion de informacion de los atributos de la clase empresa
        $respuesta .= "Informacion de la Empresa:\n";
        $respuesta .= "*Denominacion: " . $this->getDenominacion() . "\n";
        $respuesta .= "*Direccion: " . $this->getDireccion() . "\n";
        $respuesta .= "Listado de clientes: " . $this->convertirArray($clientes) . "\n";
        $respuesta .= "Listado de Motos: " . $this->convertirArray($motos) . "\n";
        $respuesta .= "Listado de Ventas: " . $this->convertirArray($ventas) . "\n";

        return $respuesta;
    }
}
