<?php
include_once 'Moto.php';

class Nacional extends Moto
{
    private $descuento;
    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa, $descuento)
    {
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa);
        $this->descuento = $descuento;
    }

    /**
     * Get the value of descuento
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set the value of descuento
     *
     * @return  self
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }
    // 4. Redefinir el método darPrecioVenta para que en el caso de las motos nacionales aplique el porcentaje de descuento
    // sobre el valor calculado inicialmente. Para el caso de las motos importadas, al valor calculado se debe sumar el
    // impuesto que pagó la empresa por su importación. 

    public function darPrecioVenta()
    {
        $precioFinal =  parent::darPrecioVenta();
        if ($this->getDescuento() == null || 0) {
            $descontado = $precioFinal * 0 / 100;
            $precioFinal = $precioFinal - $descontado;
        } else {
            $descontado = $precioFinal * $this->getDescuento() / 100;
            $precioFinal = $precioFinal - $descontado;
        }

        return $precioFinal;
    }

    public function __toString()
    {
        $cadena = "";
        $cadena .= parent::__toString() . "\n";
        $cadena .= "Descuento: %" . $this->getDescuento() . "\n";
        return $cadena;
    }
}
