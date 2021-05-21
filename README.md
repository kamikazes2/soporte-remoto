# soporte-remoto
 Proyecto Gestion de Sistemas


Para crear un nuevo servicio enviar un POST
con el nombre, descripcion y el precio a /request/nuevo-servicio

Para listar los servicios solicitar un GET a /listaServicios

Para crear una nueva solicitud de servicio enviar un POST a
/request/nuevo-solicitud-servicio con los siguientes datos
        idCliente
        idServicio
        precioFijado

Para crear un nuevo seguimiento enviar un POST A
/request/nuevo-seguimiento con los siguientes datos
        idAsignacionServicio
        idJefeTecnico
        descripcion

Para completar un servicio enviar un POST A
/request/finalizar-servicio con el dato de idServicioRealizar