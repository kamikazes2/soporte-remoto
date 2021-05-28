<?php

namespace Src\ModuloCliente\Cliente\Domain\Contracts;
use Src\ModuloCliente\Cliente\Domain\Cliente;

interface ClienteRepositoryContract{
    public function save(Cliente $cliente);
}