<?php
// En la clase Cliente:
// 0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de  documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.


class Cliente
{

    private $nombre;
    private $apellido;
    private $estado; //alta o baja
    private $tipo;
    private $doc;

    public function __construct($nombre, $apellido, $estado, $tipo, $doc)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->estado = $estado;
        $this->tipo = $tipo;
        $this->doc = $doc;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * Get the value of doc
     */
    public function getDoc()
    {
        return $this->doc;
    }

    /**
     * Set the value of doc
     *
     * @return  self
     */
    public function setDoc($doc)
    {
        $this->doc = $doc;
    }
    public function EstadoString()
    {
        $estado = $this->getEstado();
        if ($estado) {
            $rta = "Activo";
        } else {
            $rta = "Inactivo";
        }
        return $rta;
    }

    public function __toString()
    {
        $msj = "";
        $msj .=
            "\nNombre: " . $this->getNombre() .
            "\nApellido: " . $this->getApellido() .
            "\nEstado: " . $this->EstadoString() .
            "\nDocumento: " . $this->getDoc() .
            "\nTipo :" . $this->getTipo();
        return $msj;
    }
}
