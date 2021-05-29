<?php
namespace Src\ModuloPagos\DetalleFactura\Domain;
final class DetalleFactura{

    private $id;
    private $idServicioRealizar;
    private $idFactura;


    public function __construct($idServicioRealizar, $idFactura){
        $this->idServicioRealizar = $idServicioRealizar;
        $this->idFactura = $idFactura;
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
    
    public static function create($idServicioRealizar, $idFactura):DetalleFactura{
        $df = new self($idServicioRealizar, $idFactura);
        return $df;
    }
}