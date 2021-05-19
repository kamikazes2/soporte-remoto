<?php
namespace Src\ModuloServicio\SolicitudServicio\Domain;
final class SolicitudServicio{

    private $id;
    private $idCliente;
    private $fechaSolicitud;

    public function __construct($idCliente, $fechaSolicitud){
        $this->idCliente = $idCliente;
        $this->fechaSolicitud = $fechaSolicitud;
    }
    public static function create($idCliente, $fechaSolicitud):SolicitudServicio{
        $solicitudservicio = new self($idCliente, $fechaSolicitud);
        return $solicitudservicio;
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
     * Get the value of idCliente
     */ 
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set the value of idCliente
     *
     * @return  self
     */ 
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get the value of fechaSolicitud
     */ 
    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    /**
     * Set the value of fechaSolicitud
     *
     * @return  self
     */ 
    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fechaSolicitud = $fechaSolicitud;

        return $this;
    }
}