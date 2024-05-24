<?php
// En la clase Venta:
// 1. Implementar el método retornarTotalVentaNacional() que retorna la sumatoria del precio venta de cada una de las
// motos Nacionales vinculadas a la venta.🟢
// 2. Implementar el método retornarMotosImportadas() que retorna una colección de motos importadas vinculadas a la
// venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía.🔴
class Venta
{
    private $numero;
    private $fecha;
    private $objCliente;
    private $arrayMotos;
    private $precioFinal;

    public function __construct($numero, $fecha, Cliente $objCliente, array $arrayMotos, $precioFinal)
    {

        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->arrayMotos = $arrayMotos;
        $this->precioFinal = $precioFinal;
    }

    /**
     * Get the value of numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }




    /**
     * Get the value of precioFinal
     */
    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }

    /**
     * Set the value of precioFinal
     *
     * @return  self
     */
    public function setPrecioFinal($precioFinal)
    {
        $this->precioFinal = $precioFinal;
    }
    /**
     *   // 5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada  vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta. Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
     */
    public function incorporarMoto($objMoto)
    {
        $arrayMotos = $this->getArrayMotos();
        if ($objMoto->getActiva()) {
            array_push($arrayMotos, $objMoto);
            $nuevoPrecio = $objMoto->darPrecioVenta();
            $nuevoPrecio = $this->getPrecioFinal() + $nuevoPrecio;
            $this->setPrecioFinal($nuevoPrecio);
        }
        return $this->getPrecioFinal();
    }



    /**
     * Get the value of objCliente
     */
    public function getObjCliente()
    {
        return $this->objCliente;
    }

    /**
     * Set the value of objCliente
     *
     * @return  self
     */
    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;

        return $this;
    }

    /**
     * Get the value of arrayMotos
     */
    public function getArrayMotos()
    {
        return $this->arrayMotos;
    }

    /**
     * Set the value of arrayMotos
     *
     * @return  self
     */
    public function setArrayMotos($arrayMotos)
    {
        $this->arrayMotos = $arrayMotos;
    }
    // 1. Implementar el método retornarTotalVentaNacional() que retorna la sumatoria del precio venta de cada una de las
    // motos Nacionales vinculadas a la venta.
    public function retornarTotalVentaNacional()
    {
        $motos = $this->getArrayMotos();
        $totalVentaNacional = 0;

        foreach ($motos as $moto) {
            if ($moto instanceof Nacional) {
                if ($moto->darPrecioVenta() <> -1) {
                    $precioVenta = $moto->darPrecioVenta();
                    $totalVentaNacional =  $totalVentaNacional + $precioVenta;
                }
            }
        }
        return $totalVentaNacional;
    }
    // 2. Implementar el método retornarMotosImportadas() que retorna una colección de motos importadas vinculadas a la
    // venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía.🔴

    public function retornarMotosImportadas()
    {
        $motos = $this->getArrayMotos();
        $motosImportadas = 0;
        $coleccionMotos = [];
        foreach ($motos as $moto) {
            if ($moto instanceof Importada) {
                if ($moto->darPrecioVenta() <> -1) {
                    $coleccionMotos[] = $moto;
                    $motosImportadas = $this->convertirArray($coleccionMotos);
                }
            }
        }

        return $motosImportadas;
    }



    public function convertirArray($array)
    {
        $cadena = "";
        foreach ($array as $atributo) {
            $cadena .= $atributo . "\n";
        }
        return $cadena;
    }


    public function __toString()
    {

        $mensaje = "";
        $mensaje .= "\nNumero de venta: " . $this->getNumero() . "\n\n";
        $mensaje .= "Fecha: " . $this->getFecha() . "\n";
        $mensaje .= "Referencia Cliente: " . $this->getObjCliente() . "\n";
        $mensaje .= "Motos vendidas: \n" . $this->convertirArray($this->getArrayMotos());
        $mensaje .= "Precio final: $" . $this->getPrecioFinal() . "\n*********************\n";


        return $mensaje;
    }
}
