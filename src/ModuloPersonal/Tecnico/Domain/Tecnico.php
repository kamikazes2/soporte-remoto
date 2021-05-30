<?php
namespace Src\ModuloPersonal\Tecnico\Domain;
final class Tecnico{

    private $id;
    private $idPersonal;

    public function __construct($idPersonal){
        $this->idPersonal = $idPersonal;
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
     * Get the value of idPersonal
     */ 
    public function getIdPersonal()
    {
        return $this->idPersonal;
    }

    /**
     * Set the value of idPersonal
     *
     * @return  self
     */ 
    public function setIdPersonal($idPersonal)
    {
        $this->idPersonal = $idPersonal;

        return $this;
    }

    public static function create($idPersonal):Tecnico{
        $res =  new self($idPersonal);
        return $res;
    }

}