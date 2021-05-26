# soporte-remoto
 Proyecto Gestion de Sistemas


#para iniciar sesion enviar un POST a
/request/buscar-usuario con usuario y password


#SERVICIO ------------------------------------------------------

#Para crear un nuevo servicio enviar un POST
con el nombre, descripcion y el precio a /request/nuevo-servicio

#Para actualizar un servicio enviar un POST
con el id, nombre y descripcion a /request/actualizar-servicio

#Para actualizar un precio enviar un POST 
con el idServicio y precio a /request/actualizar-precio

#Para listar los servicios solicitar un GET a /listaServicios

#para eliminar un servicio con su precio enviar un DELETE a
/request/eliminar/{idServicio}

#FIN SERVICIO ------------------------------------------------------

#ESPECIALIDAD ----------------------------------------------------
post ->      /request/nuevo-especialidad             nombre, descripcion
post ->     /request/actualizar-especialidad        id, nombre, descripcion
get ->      /request/lista-especialidad             
delete->    /request/eliminar-especialidad/{id}     id
get->       /request/get-especialidad?idServicio=1  ------> Get Especialidades by IdServicio

#para anhadir especialidad al servicio enviar un POST a 
/request/nueva-especialidad-servicio con los siguientes datos
{
    "idServicio": 0,
    "idEspecialidades":[
        {
            "id" : 0
        },
        {
            "id" : 0
        }
    ]
}
#FIN ESPECIALIDAD ---------------------------------------------------



#PERSONALES-----------------------------------------------

#para crear un nuevo tecnico enviar un POST A
/request/nuevo-tecnico
con los siguientes datos
dni
nombre
apellido
fechaNacimiento
usuario
password

#para anhadir especialidad al tecnico enviar un POST a 
/request/nueva-especialidad-personal con los siguientes datos
{
    "idPersonal": 0,
    "idEspecialidades":[
        {
            "id" : 0
        },
        {
            "id" : 0
        }
    ]
}
#FIN PERSONALES ----------------------------------------------




#SOLICITUD SERVICIO ------------------------------------------------------
#Para crear una nueva solicitud de servicio enviar un POST a
/request/nuevo-solicitud-servicio con los siguientes datos
        idCliente
        idServicio
        precioFijado
#FIN SOLICITUD SERVICIO ------------------------------------------------------


#Para crear un nuevo seguimiento enviar un POST A
/request/nuevo-seguimiento con los siguientes datos
        idAsignacionServicio
        idJefeTecnico
        descripcion

#Para completar un servicio enviar un POST A
/request/finalizar-servicio con el dato de idServicioRealizar

#para listar mis solicitudes solicitar un get a
/listarMisSolicitudes





#clientes---------------------------------

post -> /request/new-cliente                        dni, nombre, apellido, fechaNacimiento, usuario, password
post -> /request/update-cliente-datos-personales    idCliente, dni, nombre, apellido
post -> /request/update-cliente-password            idCliente, oldPassword, newPassword



#clientes fin ----------------------------