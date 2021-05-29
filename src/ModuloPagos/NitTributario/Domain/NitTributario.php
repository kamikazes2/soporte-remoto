<?php
namespace Src\ModuloPagos\NitTributario\Domain;
final class NitTributario{

    private $id;
    private $idCliente;
    private $nit;
    private $nombre;
    private $tipo;


    public function __construct($idCliente, $nit, $nombre, $tipo){
        $this->idCliente = $idCliente;
        $this->nombre = $nombre;
        $this->nit = $nit;
        $this->tipo =  $tipo;
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
     * Get the value of nit
     */ 
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set the value of nit
     *
     * @return  self
     */ 
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
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

        return $this;
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

        return $this;
    }
    public static function create($idCliente, $nit, $nombre, $tipo):NitTributario{
        $nt = new self($idCliente, $nit, $nombre, $tipo);
        return $nt;
    }
}