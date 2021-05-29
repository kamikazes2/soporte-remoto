<?php
namespace Src\ModuloPagos\Factura\Domain;
final class Factura{

    private $id;
    private $idNit;
    private $fecha;


    public function __construct($idNit, $fecha){
        $this->idNit = $idNit;
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
     * Get the value of idNit
     */ 
    public function getIdNit()
    {
        return $this->idNit;
    }

    /**
     * Set the value of idNit
     *
     * @return  self
     */ 
    public function setIdNit($idNit)
    {
        $this->idNit = $idNit;

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


    public static function create($idNit, $fecha):Factura{
        $nt = new self($idNit, $fecha);
        return $nt;
    }
}