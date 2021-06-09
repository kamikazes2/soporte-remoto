<?php
namespace Src\ModuloPagos\DetalleFactura\Domain;
final class DetalleFactura{

    private $id;
    private $idFactura;
    private $idSolicitudServicio;
    private $nroPago;
    private $monto;
    private $detalle;

    public function __construct($idFactura, $idSolicitudServicio, $nroPago, $monto, $detalle){
        $this->idFactura = $idFactura;
        $this->idSolicitudServicio = $idSolicitudServicio;
        $this->nroPago = $nroPago;
        $this->monto = $monto;
        $this->detalle = $detalle;
    }

    public static function create($idFactura, $idSolicitudServicio, $nroPago, $monto, $detalle):DetalleFactura{
        $df = new self($idFactura, $idSolicitudServicio, $nroPago, $monto, $detalle);
        return $df;
    }

    /**
     * Get the value of idFactura
     */ 
    public function getIdFactura()
    {
        return $this->idFactura;
    }

    /**
     * Set the value of idFactura
     *
     * @return  self
     */ 
    public function setIdFactura($idFactura)
    {
        $this->idFactura = $idFactura;

        return $this;
    }

    /**
     * Get the value of idSolicitudServicio
     */ 
    public function getIdSolicitudServicio()
    {
        return $this->idSolicitudServicio;
    }

    /**
     * Set the value of idSolicitudServicio
     *
     * @return  self
     */ 
    public function setIdSolicitudServicio($idSolicitudServicio)
    {
        $this->idSolicitudServicio = $idSolicitudServicio;

        return $this;
    }

    /**
     * Get the value of nroPago
     */ 
    public function getNroPago()
    {
        return $this->nroPago;
    }

    /**
     * Set the value of nroPago
     *
     * @return  self
     */ 
    public function setNroPago($nroPago)
    {
        $this->nroPago = $nroPago;

        return $this;
    }

    /**
     * Get the value of monto
     */ 
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set the value of monto
     *
     * @return  self
     */ 
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get the value of detalle
     */ 
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Set the value of detalle
     *
     * @return  self
     */ 
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;

        return $this;
    }
}