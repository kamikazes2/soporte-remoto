<?php
namespace Src\ModuloPersonal\EspecialidadPersonal\Domain;
final class EspecialidadPersonal{

    private $idPersonal;
    private $idEspecialidad;


    public function __construct($idPersonal, $idEspecialidad){
        $this->idPersonal = $idPersonal;
        $this->idEspecialidad = $idEspecialidad;
    }

    public static function create($idPersonal, $idEspecialidad):EspecialidadPersonal{
        $especialidad = new self($idPersonal, $idEspecialidad);
        return $especialidad;
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

    /**
     * Get the value of idEspecialidad
     */ 
    public function getIdEspecialidad()
    {
        return $this->idEspecialidad;
    }

    /**
     * Set the value of idEspecialidad
     *
     * @return  self
     */ 
    public function setIdEspecialidad($idEspecialidad)
    {
        $this->idEspecialidad = $idEspecialidad;

        return $this;
    }
}