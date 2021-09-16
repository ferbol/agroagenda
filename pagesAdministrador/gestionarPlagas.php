<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- NO CACHE EN LOS BUSCADORES !-->
        <meta charset="utf-8">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">


 <!-- LIBRERIAS BOOTSTRAP !-->
    <script src="../framework/bootstrap/js/jquery-3.3.1.min.js"></script>
      <script src="../framework/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../framework/bootstrap/css/bootstrap.min.css">
  <script src="../framework/bootstrap/js/popper.min.js"></script>

  <script src="../framework/alertifyjs/alertify.js"></script>
  <link rel="stylesheet" type="text/css" href="../framework/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="../framework/alertifyjs/css/themes/default.css">

  <!-- <script src='framework/fullcalendar/lib/jquery.min.js'></script> -->
  <script src='../framework/fullcalendar/lib/moment.min.js'></script>
  <script src='../framework/fullcalendar/fullcalendar.min.js'></script>
  <link rel='stylesheet' href='../framework/fullcalendar/fullcalendar.min.css' />
  <script src='../framework/fullcalendar/es.js'></script>

  <script src='../framework/bootstrap/js/bootstrap-clockpicker.js'></script>
  <link rel="stylesheet" href="../framework/bootstrap/css/bootstrap-clockpicker.css">

  <link rel="stylesheet" href="../css/footer.css">
<script src='../js/datos.js'></script>

     <!-- Custom styles for this template -->
    <link href="../css/one-page-wonder.min.css" rel="stylesheet">

      <!-- URL BD -->
    <script src='../js/url_BD.js'></script>

    <script src="../js/funcionGestionarPlaga.js"></script>



	<style>
  .bg-1 {
      background-color: #1abc9c;
      color: #ffffff;
  }
  .bg-2 {
      background-color: #474e5d;
      color: #ffffff;
  }
  .bg-3 {
      background-color: #ffffff;
      color: #555555;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
   /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
    .fc th{
    padding: 10px 0px;
    vertical-align: middle;
    background: #F2F2F2;
    width: 3px;
    height: 2px;
  }
    .fc td{
    width: 3px;
    height: 3px;
  }
  </style>



	<title>Agro Agenda</title>
</head>
<body>

<!--MENU--------------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" >
    <div class="container">
  <a class="navbar-brand" href="index.html" >
   <b> AGROAGENDA </b>
  <!-- <img src="img/logo.png" alt="Los Angeles" width="1100" height="500"> -->
  </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


  <div class="navbar-collapse collapse" id="navbarResponsive" style="">

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../index.html" id="Inicio">Inicio <span class="sr-only">(current)</span> </a>
      </li>
      
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administrador
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item " href="listarAgenda.html" id="Agenda">Agendas</a>
          <a class="dropdown-item " href="gestionarUsuario.html" id="gestionarUsuario">Gestionar Usuario</a>
          <a class="dropdown-item " href="gestionarExperiencias.html" id="gestionarExperiencias">Gestionar Experiencias</a>
          <a class="dropdown-item " href="gestionarPlagas.php" id="gestionarPlagas">Gestionar Plagas</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="redSocial.html" id="redSocial">Red Social</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../paginas/empresas.html" id="Empresas">Empresas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../paginas/contacto.html" id="Contacto">Contacto</a>
      </li>  

                  <li class="nav-item">
              <a class="nav-link" href="../paginas/registroPublico.html" style="color: yellow" id="Registrarse">Registrarse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../paginas/login.html" style="color: yellow" id="IniciarSesion">Iniciar Sesión</a>
            </li> 
            <li class="nav-item">
              <button type="button" onclick="CerrarSesion()" class="btn btn-outline-light" id="CerrarSesion">Cerrar Sesión</button>
            </li>  
    </ul>

  </div>


</div>
</nav>
<!--FIN MENU--------------------------------->



<br>

<div class="container-fluid">

  
    <h1 style="text-align: center;">Gestionar Plagas</h1>
    <hr>
              
 
<!-- /////////////////////////// TABLA (se encuentra en tabla.php) //////////////////////////// -->
     <div id="tablaPlagas">
       
     </div>
 


<!-- MODAL AGREGAR ------------------------->
                    <div class="modal fade" id="modalAgregar" role="dialog" >
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content"  >
                          <div class="modal-header">
                          <h5 class="modal-title" id="tituloEventoModal">Ingresar la siguiente informacón</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                          <div class="modal-body" > 
                           
                            
                             <div style="display: none;">
                              Id: <input type="text" style="display: none;" id="txtIdPlaga" name="txtIdPlaga"> <br/> 
                            </div>
                            <div class="row">
                                    <div class="col" >
                                            <label for="usr">Nombre:</label>
                                            <input type="text" class="form-control" id="txtNombrePlaga" placeholder="Ingresar aqui..." name="pNombre" autofocus required>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col" >
                                            <label for="exampleFormControlTextarea1">Plaguicidas:</label>
                                            <textarea class="form-control"  id="txtPlaguicida" rows="3"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col" >
                                            <label for="exampleFormControlTextarea1">Tratamiento:</label>
                                            <textarea class="form-control"  id="txtTratamiento" rows="3"></textarea>
                                    </div>
                                </div>

                              
                            
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" id="botonConfimar" >Confirmar</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <!--FIN MODAL AGREGAR ------------------------->

                                     <!-- MODAL EDITAR ------------------------->
                    <div class="modal fade" id="modalEdicion" role="dialog" >
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content" >
                          <div class="modal-header">
                          <h5 class="modal-title" id="tituloEventoModal">Editar informacón de la Plaga</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                          <div class="modal-body" >
                            
                           <div style="display: none;">
                              Id: <input type="text" style="display: none;" id="txtIdPlagaEdit" name="txtIdPlagaEdit"> <br/> 
                            </div>
                            <div class="row">
                                    <div class="col" >
                                            <label for="usr">Nombre:</label>
                                            <input type="text" class="form-control" id="txtNombrePlagaEdit" placeholder="Ingresar aqui..." name="pNombre" autofocus required>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col" >
                                            <label for="exampleFormControlTextarea1">Plaguicidas:</label>
                                            <textarea class="form-control"  id="txtPlaguicidaEdit" rows="3"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col" >
                                            <label for="exampleFormControlTextarea1">Tratamiento:</label>
                                            <textarea class="form-control"  id="txtTratamientoEdit" rows="3"></textarea>
                                    </div>
                                </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal" id="botonEditarRegistro">Actualizar</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <!--  FIN MODAL EDITAR------------------------->

</div>
<br><br>

 <!-- FOOTER ----------------   -->
<footer class="footer">
  <div class="container text-center">
  <p class="text-xs-center" >

  </p>
  </div>
</footer>

<footer class="mainfooter" role="contentinfo">



  <div class="footer-middle">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Dirección</h4>
          <address>
                <ul class="list-unstyled">
                  <li>
                    Sincelejo (Sucre)<br>
                    212  Street<br>
                    Lawoma<br>
                    735<br>
                  </li>
                  <li>
                    Phone: 0
                  </li>
                </ul>
              </address>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Popular Services</h4>
          <ul class="list-unstyled">
            <li><a href="#"></a></li>
            <li><a href="#">Payment Center</a></li>
            <li><a href="#">Contact Directory</a></li>
            <li><a href="#">Forms</a></li>
            <li><a href="#">News and Updates</a></li>
            <li><a href="#">FAQs</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Website Information</h4>
          <ul class="list-unstyled">
            <li><a href="#">Website Tutorial</a></li>
            <li><a href="#">Accessibility</a></li>
            <li><a href="#">Disclaimer</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Webmaster</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Popular Departments</h4>
          <ul class="list-unstyled">
            <li><a href="#">Parks and Recreation</a></li>
            <li><a href="#">Public Works</a></li>
            <li><a href="#">Police Department</a></li>
            <li><a href="#">Fire</a></li>
            <li><a href="#">Mayor and City Council</a></li>
            <li>
              <a href="#"></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!--<div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">

          <p class="text-xs-center" >&copy; Copyright 2018 - CECAR.  Todos los derechos reservados.</p>
        </div>
      </div>
    </div>
  </div> -->
</footer>

<footer class="footer">
  <div class="container text-center">
  <p class="text-xs-center" >&copy; Copyright 2018 - AGROAGENDA.  Todos los derechos reservados.</p>
  </div>
</footer>

<!-- FIN FOOTER -----------------------------------------------------------   -->

<script >

var DatosCultivos;
 
  stylosSesiones();
  document.getElementById('Agenda')//.style.display=agenda;
  document.getElementById('Registrarse').style.display=registrarse;
  document.getElementById('IniciarSesion').style.display=iniciarSesion;
  document.getElementById('CerrarSesion').style.display=cerrarSesion;
  document.getElementById('navbarDropdown').style.display=menuAdministrador;
  //document.getElementById('agregarCultivos').style.display=agregarSuper;
  //document.getElementById('agregarExperienciaCultivo').style.display=agregarExpeAdmin;

  if(sessionStorage.getItem('3')=="superAdmin"){
  }else if(sessionStorage.getItem('3')=="administrador"){
    }else if(sessionStorage.getItem('3')=="trabajador"){
        window.location.href="../index.html";
    }else{
      window.location.href="../index.html";
    }


//CARGAR LA TABLA QUE ESTA EN EL BODY------------------->
  $(document).ready(function(){
    $('#tablaPlagas').load('gestionarPlagasTabla.php');
  });
//-----------------------------------


//------------///////////////////////////////////////////////////////////////////////////////////////7
function LlenarSelectCultivos(idRegion){
      //LLENAR LOS SELECT DEL NOMBRE DE CULTIVOS PARA LAS EXPERIENCIAS    
             $(function() {
               $('#txtNombreCultivoExp').empty();
               $('#txtNombreCultivoExp').append('<option name="" selected="" disabled=""> Seleccione </option>');


                $.getJSON(ConsultarCultivosBDD+idRegion, function(data) {

                  for (var i = 0; i < data.length; i++) {
                  //  $('#traer').append(data[i].nombre + '</br>');

                    $('#txtNombreCultivoExp').append('<option name="' + data[i].idCultivo + '">' + data[i].nombreCultivo + '</option>');
                  }
                })
                .fail(function(){
                  alertify.error('Error Al Contultar');
                })
              });
//////////////////////////////////////////////
}

//SELECCIONAR REGIONES Y LLENAR SELECT DE CULTIVOS
$(document).ready(function() {
    $("#txtRegionExp").change(function() {

 LlenarSelectCultivos($('#txtRegionExp').val());
    });
});

//LLENAR LOS INPUT  DESCRIPCION  EL SELECT DE NOMBRE DEL CULTIVO
$(document).ready(function() {
    $("#txtNombreCultivoExp").change(function() {
  $("#txtDescripcionExp").empty();
  $.getJSON(ConsultarDescripcion+$("#txtNombreCultivoExp").val(),function(data){
    //console.log(data[0]);
    
    $('#txtDescripcionExp').append(data[0].descripcion);
    //$('#txtRegionExp').val(data[0].region);

  });
    });
});
//----/////////////////////////FIN LLENAR INPUT////////////////////////////////////////////////////////////


</script>


<!--  ///////////// PARA ALMACENAR LOS DATOS EN EJECUCION la funcion (esta en funciones.js)///////////////////////// -->
<script type="text/javascript">

 $(document).ready(function(){
    $('#botonConfimar').click(function(){

//var sel=document.getElementById('selecTipoUsuario').options[document.getElementById('selecTipoUsuario').selectedIndex].text;

     //txtIdPlaga=$('#txtIdPlaga').val();
      txtNombrePlaga=$('#txtNombrePlaga').val();
      sNombreUsu=$('#sNombreUsu').val();
      txtPlaguicida=$('#txtPlaguicida').val();
      txtTratamiento=$('#txtTratamiento').val();


      funcionAgregarUsuarios(txtNombrePlaga,txtPlaguicida,txtTratamiento);

      limpiarDiv();
    });

//EJECUTA LA FUNCION (esta en funciones.js) QUE ACTUALIZA LOS DATOS CUANDO SE PRESIONA EL BOTON editarregistro
    $('#botonEditarRegistro').click(function(){
        actualizarDatos();
    });

  });


  function limpiarDiv(){

    document.getElementById('txtIdPlaga').value="";
     document.getElementById('txtNombrePlaga').value="";
     document.getElementById('txtPlaguicida').value="";
     document.getElementById('txtTratamiento').value="";


  }
</script>


</body>
</html>
