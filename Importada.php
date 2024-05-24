<?php
include_once 'Moto.php';
class Importada extends Moto
{

    private $pais;
    private $impuestos;
    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa, $pais, $impuestos)
    {
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa);
        $this->pais = $pais;
        $this->impuestos = $impuestos;
    }

    /**
     * Get the value of pais
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     *
     * @return  self
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    /**
     * Get the value of impuestos
     */
    public function getImpuestos()
    {
        return $this->impuestos;
    }

    /**
     * Set the value of impuestos
     *
     * @return  self
     */
    public function setImpuestos($impuestos)
    {
        $this->impuestos = $impuestos;
    }

    //Redefinir el método darPrecioVenta para que en el caso de las motos nacionales aplique el porcentaje de descuento
    // sobre el valor calculado inicialmente. Para el caso de las motos importadas, al valor calculado se debe sumar el
    // impuesto que pagó la empresa por su importación. 
    public function darPrecioVenta()
    {
        $precioFinal = parent::darPrecioVenta();
        $precioFinal = $precioFinal + $this->getImpuestos();
        return $precioFinal;
    }


    public function __toString()
    {
        $cadena = "";
        $cadena .= parent::__toString();
        $cadena .= "Pais de origen: " . $this->getPais() . "\n";
        $cadena .= "Impuestos de importación: $" . $this->getImpuestos() . "\n*********************";

        return $cadena;
    }
}
