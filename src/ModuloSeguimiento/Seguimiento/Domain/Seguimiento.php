<?php
namespace Src\ModuloSeguimiento\Seguimiento\Domain;
final class Seguimiento{

    private $id;
    private $idAsignacionServicio;
    private $idJefeTecnico;
    private $fecha;
    private $descripcion;

    public function __construct($idAsignacionServicio, $idJefeTecnico, $fecha, $descripcion ){
        $this->idAsignacionServicio = $idAsignacionServicio;
        $this->idJefeTecnico = $idJefeTecnico;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
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
     * Get the value of idAsignacionServicio
     */ 
    public function getIdAsignacionServicio()
    {
        return $this->idAsignacionServicio;
    }

    /**
     * Set the value of idAsignacionServicio
     *
     * @return  self
     */ 
    public function setIdAsignacionServicio($idAsignacionServicio)
    {
        $this->idAsignacionServicio = $idAsignacionServicio;

        return $this;
    }

    /**
     * Get the value of idJefeTecnico
     */ 
    public function getIdJefeTecnico()
    {
        return $this->idJefeTecnico;
    }

    /**
     * Set the value of idJefeTecnico
     *
     * @return  self
     */ 
    public function setIdJefeTecnico($idJefeTecnico)
    {
        $this->idJefeTecnico = $idJefeTecnico;

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

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public static function create($idAsignacionServicio, $idJefeTecnico, $fecha, $descripcion ):Seguimiento{
        $seguimiento = new self($idAsignacionServicio, $idJefeTecnico, $fecha, $descripcion );
        return $seguimiento;
    }

}