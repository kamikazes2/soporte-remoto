<?php

namespace Src\ModuloPersonal\Tecnico\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Src\ModuloPersonal\Tecnico\Infrastructure\Repositories\EloquentTecnicoRepository;

use App\Models\PersonalPack\Tecnico;
use Src\ModuloPersonal\Tecnico\Application\CreateTecnicoUseCase;
use Src\ModuloPersonal\Tecnico\Application\GetTecnicosUseCase;
use Src\ModuloPersonal\Tecnico\Application\DeleteTecnicoUseCase;





class TecnicoController
{
    private $tecnicoRepository;

    public function __construct(
        EloquentTecnicoRepository $repository
        ){
        $this->tecnicoRepository = $repository;
    }

    public function createTecnico(Request $request){
        $createTecnicoUC = new CreateTecnicoUseCase($this->tecnicoRepository);
        $idPersonal = $request['idPersonal'];
        $usu = $createTecnicoUC->__invoke(
            $idPersonal
        );
        return $usu;
    }

    public function getTecnicos(){
        $gpUC = new GetTecnicosUseCase($this->tecnicoRepository);
        $tecnicoes = $gpUC->__invoke();
        return $tecnicoes;
    }

    public function getTecnicobyUserId(){
        $idUsuario = Session::get('idUsuario');
        $t = new Tecnico;
        
        $res = $t->getTecnicobyUserId($idUsuario);

        if($res != null){
            return response()->json(
                ['error' => false, 'tecnico' => $res]
            );
        }else{
            return response()->json(
                ['error' => true, 'message' => "no existe tecnico"]
            );
        }
    }

    public function deleteTecnico(Request $request){
        $dUC = new DeleteTecnicoUseCase($this->tecnicoRepository);
        $idPersonal = $request['idPersonal'];
        $tecnicoes = $dUC->__invoke($idPersonal);
        return $tecnicoes;
    }


}
