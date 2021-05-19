<?php
namespace Src\ModuloServicio\AsignacionServicio\Domain;
final class AsignacionServicio{

    private $id;
    private $idServicioRealizar;
    private $idTecnico;
    private $fecha;

    public function __construct($idServicioRealizar, $idTecnico, $fecha){
        $this->idServicioRealizar = $idServicioRealizar;
        $this->idTecnico = $idTecnico;
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
     * Get the value of idServicioRealizar
     */ 
    public function getIdServicioRealizar()
    {
        return $this->idServicioRealizar;
    }

    /**
     * Set the value of idServicioRealizar
     *
     * @return  self
     */ 
    public function setIdServicioRealizar($idServicioRealizar)
    {
        $this->idServicioRealizar = $idServicioRealizar;

        return $this;
    }

    /**
     * Get the value of idTecnico
     */ 
    public function getIdTecnico()
    {
        return $this->idTecnico;
    }

    /**
     * Set the value of idTecnico
     *
     * @return  self
     */ 
    public function setIdTecnico($idTecnico)
    {
        $this->idTecnico = $idTecnico;

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

    public static function create($idServicioRealizar, $idTecnico, $fecha):AsignacionServicio{
        $asignacionServicio = new self($idServicioRealizar, $idTecnico, $fecha);
        return $asignacionServicio;
    }


}