//URL DEL HOSTING USADO
//var hosting='https://webserviceotta.000webhostapp.com';
var hosting='http://localhost/agroagenda';
//var hosting='http://169.254.55.218/agroagenda';


//URL DEL INDEX
//LLENAR LOS SELECT DEL NOMBRE DE CULTIVOS PARA LAS EXPERIENCIAS  
var ConsultarCultivosBD=hosting+'/php/consultasCultivos.php?accion=consultarCultivos';

//LLENAR LOS SELECT DEL NOMBRE DE CULTIVOS PARA LAS EXPERIENCIAS  
var ConsultarCultivosBDD=hosting+'/php/consultasCultivos.php?accion=consultarCultivos1&idRegion=';

//LLENAR LOS INPUT  DESCRIPCION Y REGION CON EL SELECT DE NOMBRE DEL CULTIVO
var ConsultarDescripcion=hosting+'/php/consultasCultivos.php?accion=consultarDescripcion&nombreCultivo=';


//LISTAR CULTIVOS DETALLE-------ACORDEON DYNAMICAS-----------------------------------------------
var ExperienciasCultivosPublica = hosting+'/php/consultasCultivos.php?accion=experienciasCultivos&idCultivo=';

//LISTAR CULTIVOS  REGION AMAZONAS -------ACORDEON DYNAMICAS------------------------------------------------
var CultivosRecomendadosAmazona=hosting+'/php/consultasCultivos.php?accion=cultivosRecomendados&idRegion=';

//LISTAR CULTIVOS REGION ANDINA-------ACORDEON DYNAMICAS-----------------------------------------------
var CultivosRecomendadosAndina=hosting+'/php/consultasCultivos.php?accion=cultivosRecomendados&idRegion=';

//LISTAR CULTIVOS REGION CARIBE-------ACORDEON DYNAMICAS-----------------------------------------------
var CultivosRecomendadosCaribe = hosting+'/php/consultasCultivos.php?accion=cultivosRecomendados&idRegion=';

//LISTAR CULTIVOS REGION ORINOQUIA-------ACORDEON DYNAMICAS-----------------------------------------------
var CultivosRecomendadosOrinoquia = hosting+'/php/consultasCultivos.php?accion=cultivosRecomendados&idRegion=';

//LISTAR CULTIVOS REGION PACIFICA-------ACORDEON DYNAMICAS-----------------------------------------------
var CultivosRecomendadosPacifica = hosting+'/php/consultasCultivos.php?accion=cultivosRecomendados&idRegion=';


//URL PAGINA AGENDA EN ADMINISTRADOR (////////////////////////////////////777)
//URL PAGINA AGENDA EN EMPLEADO (////////////////////////////////////777)
//ruta para capturar los datos en la base de datos

var DatodF = hosting+'/php/eventos.php?accion=datosdf&idAgenda=';

//ENVIAR INFORMACION A LA BASE DE DATOS
var EnventosPHP=hosting+'/php/eventos.php?accion=';


//URL PAGINA GESTIONAR USUARIO
 //LISTAR INFORMACION EMPLEADOS-------ACORDEON DYNAMICAS------------------------------------------------
  //ENVIAR INFORMACION A LA BASE DE DATOS
  var ListarUsuarios = hosting+'/php/consultas.php?accion=listarUsuarios&idUsuario=';

//ACTUALIZAR USUARIOS
var ActualizarUsuariosBD = hosting+'/php/consultas.php?accion=actualizarUsuario';

//CAMBIAR PASWORD
var CambiarPasswordBD = hosting+'/php/consultas.php?accion=cambiarPassword';

//AGREGAR USUARIOS BD
var AgregarUsuariosBD = hosting+'/php/consultas.php?accion=agregarUsuarios';

//ELIMINAR USUARIOS BD
var EliminarUsuarioBD = hosting+'/php/consultas.php?accion=eliminarUsuario';
//////////////////////////


//PAGINA LISTAR AGENDA EN PAGES ADMINISTRADOR--------------------------------------------------------------
  //LISTAR AGENDAS EMPLEADOS-------ACORDEON DYNAMICAS------------------------------------------------
  //ENVIAR INFORMACION A LA BASE DE DATOS
var AgendasEmpleadosBD= hosting+'/php/consultas.php?accion=agendasEmpleados&idUsuario=';

 //LISTAR AGENDAS ADMINISTRADOR-------ACORDEON DYNAMICAS------------------------------------------------
  //ENVIAR INFORMACION A LA BASE DE DATOS
var AgendasAdministradorBD=hosting+'/php/consultas.php?accion=agendasAdministrador&idUsuario=';


//UTILIZADAS EN listarAgenda EN PAGESADMINISTRADOR
//UTILIZADAS EN listarAgendaEmpleados EN PAGESEMPLEADOS
//ACTUALIZAR AGENDA
var ActualizarAgendaBD = hosting+'/php/consultas.php?accion=actualizarAgenda';

//ELIMINAR AGENDA BD
var EliminarAgendaBD = hosting+'/php/consultas.php?accion=eliminarAgenda';

//CREAR AGENDA BD
var CrearAgendaBD = hosting+'/php/consultas.php?accion=crearAgenda';


//pagina login
var LoginBD = hosting+'/php/consultas.php?accion=login&idUsuario=';

//pagina registroPublico
var RegistroBD=hosting+'/php/consultas.php?accion=';


//PAGINA GESTIONAR EXPERIENCIAS EN PAGESADMINISTRADOR
var InsertarExperiencias = hosting+'/php/consultasCultivos.php?accion=insertarDetalleCultivo';

var EditarExperiencias = hosting+'/php/consultasCultivos.php?accion=experienciasActualizar';

var EliminarExperiencias = hosting+'/php/consultasCultivos.php?accion=eliminarExperiencias';

//LISTA LAS EXPERIENCIAS DEL ADMIN
var ExperienciasCultivos = hosting+'/php/consultasCultivos.php?accion=experienciasCultivosAdmin&idUsuario=';

var agregarCultivosSuper = hosting+'/php/consultasCultivos.php?accion=agregarCultivoSuper';

var consultarCodigoAgenda = hosting+'/php/consultasCultivos.php?accion=consultarCodigoAgenda&idUsuario=';

var agregarActividad = hosting+'/php/consultasCultivos.php?accion=agregarActividad';

var consultarActividades = hosting+'/php/consultasCultivos.php?accion=consultarActividades&idAgenda=';

var eliminarActividades = hosting+'/php/consultasCultivos.php?accion=eliminarActividad';

var agregarRetroalimentacion = hosting+'/php/consultasRetroalimentacion.php?accion=agregarComentario';

var consultarActividadesSocial=hosting+'/php/consultasRetroalimentacion.php?accion=consultarActividadesSocial&idCultivo=';

var consultarRetroalimentacion=hosting+'/php/consultasRetroalimentacion.php?accion=consultarRetroalimentacion&idActividad=';

var consultarComentariosSocial=hosting+'/php/consultasRetroalimentacion.php?accion=consultarComentariosSocial&idRetroalimentacion=';

var enviarComentarios=hosting+'/php/consultasRetroalimentacion.php?accion=insertarComenatrioSocial';





