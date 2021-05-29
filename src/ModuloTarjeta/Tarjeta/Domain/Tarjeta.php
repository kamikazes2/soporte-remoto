<?php
namespace Src\ModuloTarjeta\Tarjeta\Domain;
final class Tarjeta{

    private $id;
    private $idCliente;
    private $nombre;
    private $numero;
    private $mes;
    private $anio;


    public function __construct($idCliente, $nombre, $numero, $mes, $anio){
        $this->idCliente = $idCliente;
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->mes =$mes;
        $this->anio =$anio;
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
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of mes
     */ 
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set the value of mes
     *
     * @return  self
     */ 
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get the value of anio
     */ 
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set the value of anio
     *
     * @return  self
     */ 
    public function setAnio($anio)
    {
        $this->anio = $anio;

        return $this;
    }

    public static function create($idCliente, $nombre, $numero, $mes, $anio):Tarjeta{
        $tar = new self($idCliente, $nombre, $numero, $mes, $anio);
        return $tar;
    }
}