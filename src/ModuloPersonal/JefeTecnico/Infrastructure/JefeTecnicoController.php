<?php

namespace Src\ModuloPersonal\JefeTecnico\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloPersonal\JefeTecnico\Infrastructure\Repositories\EloquentJefeTecnicoRepository;


use Src\ModuloPersonal\JefeTecnico\Application\CreateJefeTecnicoUseCase;
use Src\ModuloPersonal\JefeTecnico\Application\GetJefeTecnicosUseCase;
use Src\ModuloPersonal\JefeTecnico\Application\DeleteJefeTecnicoUseCase;





class JefeTecnicoController
{
    private $jefeTecnicoRepository;

    public function __construct(
        EloquentJefeTecnicoRepository $repository
        ){
        $this->jefeTecnicoRepository = $repository;
    }

    public function createJefeTecnico(Request $request){
        $createJefeTecnicoUC = new CreateJefeTecnicoUseCase($this->jefeTecnicoRepository);
        $idPersonal = $request['idPersonal'];
        $usu = $createJefeTecnicoUC->__invoke(
            $idPersonal
        );
        return $usu;
    }

    public function getJefeTecnicos(){
        $gpUC = new GetJefeTecnicosUseCase($this->jefeTecnicoRepository);
        $jefeTecnicoes = $gpUC->__invoke();
        return $jefeTecnicoes;
    }

    public function deleteJefeTecnico(Request $request){
        $dUC = new DeleteJefeTecnicoUseCase($this->jefeTecnicoRepository);
        $idPersonal = $request['idPersonal'];
        $jefeTecnicoes = $dUC->__invoke($idPersonal);
        return $jefeTecnicoes;
    }


}
