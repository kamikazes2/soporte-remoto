<?php
namespace Src\ModuloServicio\EspecialidadServicio\Domain;
final class EspecialidadServicio{

    private $idServicio;
    private $idEspecialidad;


    public function __construct($idServicio, $idEspecialidad){
        $this->idServicio = $idServicio;
        $this->idEspecialidad = $idEspecialidad;
    }

    public static function create($idServicio, $idEspecialidad):EspecialidadServicio{
        $especialidad = new self($idServicio, $idEspecialidad);
        return $especialidad;
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