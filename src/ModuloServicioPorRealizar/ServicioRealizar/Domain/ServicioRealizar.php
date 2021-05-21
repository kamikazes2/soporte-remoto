<?php
namespace Src\ModuloServicioPorRealizar\ServicioRealizar\Domain;
final class ServicioRealizar{

    private $id;
    private $idServicio;
    private $idSolicitud;
    private $precioFijado;
    private $completado;
    private $estado;

    public function __construct($idServicio, $idSolicitud, $precioFijado, $completado, $estado){
        $this->idServicio = $idServicio;
        $this->idSolicitudServicio = $idSolicitud;
        $this->precioFijado = $precioFijado;
        $this->completado = $completado;
        $this->estado = $estado;
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
     * Get the value of idSolicitudServicio
     */ 
    public function getIdSolicitud()
    {
        return $this->idSolicitudServicio;
    }

    /**
     * Set the value of idSolicitudServicio
     *
     * @return  self
     */ 
    public function setIdSolicitud($idSolicitud)
    {
        $this->idSolicitud = $idSolicitud;

        return $this;
    }

    /**
     * Get the value of precioFijado
     */ 
    public function getPrecioFijado()
    {
        return $this->precioFijado;
    }

    /**
     * Set the value of precioFijado
     *
     * @return  self
     */ 
    public function setPrecioFijado($precioFijado)
    {
        $this->precioFijado = $precioFijado;

        return $this;
    }

    /**
     * Get the value of completado
     */ 
    public function getCompletado()
    {
        return $this->completado;
    }

    /**
     * Set the value of completado
     *
     * @return  self
     */ 
    public function setCompletado($completado)
    {
        $this->completado = $completado;

        return $this;
    }
    public static function create($idServicio, $idSolicitudServicio, $precioFijado, $completado, $estado):ServicioRealizar{
        $servicioRealizar = new self($idServicio, $idSolicitudServicio, $precioFijado, $completado, $estado);
        return $servicioRealizar;
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

        return $this;
    }
}