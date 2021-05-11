<?php
namespace Src\ModuloServicio\PrecioServicio\Domain;
final class PrecioServicio{

    private $id;
    private $idServicio;
    private $precio;
    private $fecha;

    public function __construct($idServicio, $precio, $fecha){
        $this->idServicio = $idServicio;
        $this->precio = $precio;
        $this->fecha = $fecha;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idServicio
     */ 
    public function getIdServicio()
    {
        return $this->idServicio;
    }

    /**
     * Set the value of idServicio
     *
     * @return  self
     */ 
    public function setIdServicio($idServicio)
    {
        $this->idServicio = $idServicio;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

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

        return $this;
    }

    public static function create($idServicio, $precio, $fecha):PrecioServicio{
        $precioservicio = new self($idServicio, $precio, $fecha);
        return $precioservicio;
    }

}