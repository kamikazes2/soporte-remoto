<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Src\ModuloServicio\Servicio\Infrastructure\GetServicioController;
use Src\ModuloServicio\Servicio\Infrastructure\CreateServicioController;
use Src\ModuloServicio\Servicio\Infrastructure\UpdateServicioController;
use Src\ModuloServicio\PrecioServicio\Infrastructure\CreatePrecioServicioController;
use Src\ModuloServicioPorRealizar\SolicitudServicio\Infrastructure\CreateSolicitudServicioController;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Infrastructure\CreateServicioRealizarController;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Infrastructure\UpdateServicioRealizarController;

use Src\ModuloSeguimiento\Seguimiento\Infrastructure\CreateSeguimientoController;


//pruebas//
use Src\ModuloAsignacion\AsignacionServicio\Infrastructure\CreateAsignacionServicioController;
use Src\ModuloAsignacion\AsignacionServicio\Infrastructure\GetAsignacionServicioController;
//fin pruebas//

use App\Models\PersonalPack\Tecnico as GetPersonalController;
use App\Models\PersonalPack\Personal;
use Session;
use Src\ModuloServicioPorRealizar\ServicioRealizar\Infrastructure\Repositories\EloquentServicioRealizarRepository;
use App\Models\ServicePack\SolicitudServicio;
use App\Models\ServicePack\ServicioRealizar;
use App\Models\ServicePack\AsignacionServicio;
use App\Models\ServicePack\Servicio;
use App\Models\ServicePack\PrecioServicio;
use App\Models\ServicePack\EspecialidadServicio;
use App\Models\ServicePack\Especialidad;


class ServicioController extends Controller
{
    private $getServicioController;
    private $createServicioController;
    private $updateServicioController;
    private $createPrecioServicioController;
    private $createSolicitudServicioController;
    private $createServicioRealizarController;
    private $updateServicioRealizarController;
    
    private $createSeguimientoController;

    //pruebas
    private $createAsignacionServicioController;
    private $getAsignacionServicioController;
    //fin pruebas
    public function __construct(
        GetServicioController $getServicioController,
        CreateServicioController $createServicioController,
        UpdateServicioController $updateServicioController,
        CreatePrecioServicioController $createPrecioServicioController,
        CreateSolicitudServicioController $createSolicitudServicioController,
        CreateServicioRealizarController $createServicioRealizarController,
        UpdateServicioRealizarController $updateServicioRealizarController,
        CreateSeguimientoController $createSeguimientoController,


        //pruebas
        CreateAsignacionServicioController $createAsignacionServicioController,
        GetAsignacionServicioController $getAsignacionServicioController
        //fin pruebas
    ){
        $this->getServicioController = $getServicioController;
        $this->createServicioController = $createServicioController;
        $this->updateServicioController = $updateServicioController;
        $this->createPrecioServicioController = $createPrecioServicioController;
        $this->createSolicitudServicioController = $createSolicitudServicioController;
        $this->createServicioRealizarController = $createServicioRealizarController;
        $this->updateServicioRealizarController = $updateServicioRealizarController;
        $this->createSeguimientoController = $createSeguimientoController;
        //pruebas
        $this->createAsignacionServicioController = $createAsignacionServicioController;
        $this->getAsignacionServicioController = $getAsignacionServicioController;
        //fin pruebas
    }

    public function getServicios()
    {
        $servicios = $this->getServicioController->__invoke();
        return response()->json($servicios);
    }

    public function CreateServicio(Request $request)
    {
        $request['idServicio'] = $this->createServicioController->__invoke($request);
        $precio = $this->createPrecioServicioController->__invoke($request);

        return response()->json($request['idServicio']);
    }
    public function updateServicio(Request $request){
        return $this->updateServicioController->__invoke($request);
    }
    public function newPrecioServicio(Request $request){
        return $this->createPrecioServicioController->__invoke($request);
    }

    public function CreateSolicitudServicio(Request $request)
    {
        $request['idCliente'] = Session::get('idUsuario');
        $idSolicitud = $this->createSolicitudServicioController->__invoke($request);
        $r2 = new Request;
        $r2['idSolicitud'] = $idSolicitud;
        //return response()->json($request['arrayServicios']);
        foreach($request['arrayServicios'] as $array){
            if($array['idServicio']!='' && $array['precioFijado']!=''){
                $r2['idServicio'] = $array['idServicio'];
                $r2['precioFijado'] = $array['precioFijado'];
            }
            $csrc = new CreateServicioRealizarController(new EloquentServicioRealizarRepository);
            $csrc->__invoke($r2);
        }
        $this->createAsignacionServicioController->__invoke(); //asignamos el servicio a un tecnico disponible
        return response()->json("creado correctamente");
    }

    public function asignarServicio(){
        $algo = $this->createAsignacionServicioController->__invoke();
        return response()->json($algo);
    }

    public function createSeguimiento(Request $request){
        $this->createSeguimientoController->__invoke($request);
        return response()->json("creado correctamente");
    }

    public function completarServicio(Request $request){
        $this->updateServicioRealizarController->complete($request);
        $idTecnicoAsignado = $this->getAsignacionServicioController->getTecnicoAsignado($request);
        $tecnico = new getPersonalController();
        $idPersonal = $tecnico->getIdPersonal($idTecnicoAsignado);
        $personal = new Personal();
        $personal->habilitarPersonal($idPersonal);
        $this->createAsignacionServicioController->__invoke();
        return response()->json("Servicio finalizado");
    }

    public function getMisSolicitudes(){
        $solicitud = new SolicitudServicio;
        $serviciosARealizar = new ServicioRealizar;
        $servicio = new Servicio;
        $tecnico = new GetPersonalController;
        $asignacion = new AsignacionServicio;
        $personal = new Personal;
        $arreglo = array();


        foreach($solicitud->getByIdCliente(Session::get('idUsuario')) as $solicitud){
            $arregloSolicitud['idSolicitud'] = $solicitud->id;
            $arregloSolicitud['fechaSolicitud'] = $solicitud->fechaSolicitud;
            $arrListServ = array();
            foreach($serviciosARealizar->getServicioRealizarByIdSolicitud($solicitud->id) as $serv){
                $s = $servicio->getById($serv->idServicio);
                $arregloServ['idServicioRealizar'] = $serv->id;
                $arregloServ['nombreServicio'] = $s->nombre;
                $arregloServ['descripcionServicio'] = $s->descripcion;
                $arregloServ['precioFijado'] = $serv->precioFijado;
                $arregloServ['estado'] = $serv->estado;
                $as = $asignacion->estaAsignado($serv->id);
                if($as != false){
                    $idTec = $as->idTecnico;
                    $idPer = $tecnico->getIdPersonal($idTec);
                    $per = $personal->getByIdPersonal($idPer);
                    $arregloServ['nombreTecnico'] = $per->nombre;
                }else{
                    $arregloServ['nombreTecnico'] = "No asignado";
                }
                array_push($arrListServ, $arregloServ);
            }
            $arregloSolicitud['arrayServicios'] = $arrListServ;
            array_push($arreglo, $arregloSolicitud);
        }
        
        return response()->json($arreglo);
    }

    public function eliminarServicio(Request $request){
        $idServicio = $request['idServicio'];
        $serv = new Servicio;
        $ps = new PrecioServicio;
        $servReal = new ServicioRealizar;
        if($servReal->existeServicio($idServicio)){
            return response()->json("ExisteTransaccion");
        };

        $ps->deleteByIdServicio($idServicio);
        $s = $serv->deleteById($idServicio);


        return response()->json($s);

        return response()->json("Eliminado");

    }

    public function addEspecialidadServicio(Request $request){
        $idServicio = $request['idServicio'];

        foreach($request['idEspecialidades'] as $especialidad){
            $esp = new EspecialidadServicio;
            $esp->idServicio = $idServicio;
            $esp->idEspecialidad = $especialidad['id'];
            $esp->save();
        }
        return response()->json("creado correctamente");
    }


    public function updateEspecialidadServicio(Request $request){
        $idServicio = $request['idServicio'];
        $espServicio = new EspecialidadServicio;
        $listaEsp = $espServicio->getEspecialidadByIdServicio($idServicio);
        $existe = false;
        foreach($listaEsp as $le){
            //eliminar lo que no envio
            $existe = false;
            foreach($request['idEspecialidades'] as $especialidad){
                if($especialidad['id'] == $le->idEspecialidad){
                    $existe = true;
                    break;
                }
            }
            if(!$existe){
                $espServicioDelete = new EspecialidadServicio;
                $espServicioDelete->deleteAsociation($idServicio, $le->idEspecialidad);
            }
        }
        foreach($request['idEspecialidades'] as $especialidad){
            //creamos si no existe
            foreach($listaEsp as $le){
                $existe = false;
                if($especialidad['id'] == $le->idEspecialidad){
                    $existe = true;
                    break;
                }
            }
            if(!$existe){
                $esp = new EspecialidadServicio;
                $esp->idServicio = $idServicio;
                $esp->idEspecialidad = $especialidad['id'];
                $esp->save();
            }
        }
        return response()->json("actualizado correctamente");
    }



    public function getEspecialidadesServicio(Request $request){
        $idServicio = $request['idServicio'];
        $espServicio = new EspecialidadServicio;
        $especialidad = new Especialidad;

        $arrayEspecialidades = array();

        foreach($espServicio->getEspecialidadByIdServicio($idServicio) as $es){
            $infoEspecialidad = $especialidad->getById($es->idEspecialidad);
            $aux['idEspecialidad'] = $es->idEspecialidad;
            $aux['nombre'] = $infoEspecialidad->nombre;
            array_push($arrayEspecialidades, $aux);
        }


        return response()->json($arrayEspecialidades);
    }



}
