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

#Para crear una nueva solicitud de servicio enviar un POST a
/request/nuevo-solicitud-servicio con los siguientes datos
        idCliente
        idServicio
        precioFijado

#Para crear un nuevo seguimiento enviar un POST A
/request/nuevo-seguimiento con los siguientes datos
        idAsignacionServicio
        idJefeTecnico
        descripcion

#Para completar un servicio enviar un POST A
/request/finalizar-servicio con el dato de idServicioRealizar

#para listar mis solicitudes solicitar un get a
/listarMisSolicitudes