<?php

namespace Src\ModuloAsignacion\AsignacionServicio\Application;

use Src\ModuloAsignacion\AsignacionServicio\Domain\Contracts\AsignacionServicioRepositoryContract;
use Src\ModuloAsignacion\AsignacionServicio\Domain\AsignacionServicio;

//otros casos de usos
use Src\ModuloServicioPorRealizar\ServicioRealizar\Application\GetServicioPendienteUseCase;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Infrastructure\Repositories\EloquentServicioRealizarRepository;
use Src\ModuloEspecialidad\EspecialidadServicio\Infrastructure\Repositories\EloquentEspecialidadServicioRepository;
use Src\ModuloEspecialidad\EspecialidadServicio\Application\GetEspecialidadServicioByServicioIdUseCase;

use Src\ModuloPersonal\Tecnico\Infrastructure\Repositories\EloquentTecnicoRepository;
use Src\ModuloPersonal\Tecnico\Application\GetTecnicoByIdEspecialidadUseCase;


use Src\ModuloEspecialidad\EspecialidadPersonal\Application\GetPersonalByIdEspecialidadUseCase;
use Src\ModuloEspecialidad\EspecialidadPersonal\Infrastructure\Repositories\EloquentEspecialidadPersonalRepository;
use Carbon\Carbon;
use App\Models\PersonalPack\Personal;
use App\Models\ServicePack\ServicioRealizar;

class CreateAsignacionServicioUseCase
{
    private $repository;

    public function __construct(AsignacionServicioRepositoryContract $repository){
        $this->repository = $repository;
    }

    public function __invoke()
    {

        //aqui el algoritmo para buscar a los tecnicos disponibles
        //pasos
        //1.- Buscar los servicios a realizar
        //2.- Buscar la especialidad de ese servicio
        //3.- Buscar Tecnicos con esa especialidad
        //4.- Ver si el tecnico esta disponible
        //5.- Asignar el Servicio a ese tecnico.

        //3.1 - Si no existe el tecnico con esa especialidad, se acaba el caso de uso.
        //3.2 - Si existe mas de un tecnico:
        //  3.2.1 - Escoger al tecnico con mas trabajos finalizados. - Esta regla puede cambiar

        $serv = new GetServicioPendienteUseCase(new EloquentServicioRealizarRepository);
        $serviciosPendientes = $serv->__invoke();

        $espSer = new GetEspecialidadServicioByServicioIdUseCase(new EloquentEspecialidadServicioRepository);
        $tec = new GetTecnicoByIdEspecialidadUseCase(new EloquentTecnicoRepository);
        

        $date = Carbon::now();
        $fecha = $date->toDateTimeString();
        foreach($serviciosPendientes as $sp){
            $especialidad = $espSer->__invoke($sp->idServicio); //busco la especialidad
            foreach($especialidad as $espe){
                $tecnicos = $tec->__invoke($espe->idEspecialidad); //getTecnicosDisponiblesConEsaEspecialidad
                $asignado = false;
                if(count($tecnicos)> 0 && $asignado == false){
                    $idServicioRealizar = $sp->id;
                    $idTecnico = $tecnicos[0]->idTecnico;
                    $idpersonal = $tecnicos[0]->idPersonal;
                    $asignacionServicio = AsignacionServicio::create($idServicioRealizar, $idTecnico, $fecha);
                    $asignacionId = $this->repository->save($asignacionServicio);
                    $p = new Personal();
                    $p->deshabilitarPersonal($idpersonal);
                    $sr = new ServicioRealizar();
                    $sr->updateToAsignado($idServicioRealizar);
                    $asignado = true;
                }
            }
        }
        return response()->json("creado correctamente");

    }

}
