<?php
namespace Src\ModuloUsuario\Usuario\Domain;
final class Usuario{

    private $id;
    private $nombre;
    private $usuario;
    private $email;
    private $password;
    private $tipoUsuario;

    public function __construct($nombre, $usuario, $email, $password, $tipoUsuario){
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->email = $email;
        $this->password = $password;
        $this->tipoUsuario = $tipoUsuario;
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
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of tipoUsuario
     */ 
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    /**
     * Set the value of tipoUsuario
     *
     * @return  self
     */ 
    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;

        return $this;
    }

    public static function create($nombre, $usuario, $email, $password, $tipoUsuario):Usuario{
        $user = new self($nombre, $usuario, $email, $password, $tipoUsuario);
        return $user;
    }
}