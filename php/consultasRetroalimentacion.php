<?php 

header("Access-Control-Allow-Origin: *");	
	include '../php/conexionMYSQL.php';	
    $accion=$_REQUEST['accion'];
    

    switch($accion){

    	case 'agregarComentario': 
            # code...

    	$idUsuario=$_REQUEST['idUsuario'];
    	$idActividad=$_REQUEST['idActividad'];
		$descripcion=$_REQUEST['descripcion'];

		$sql = "INSERT INTO `retroalimentacion` (`idRetroalimentacion`, `descripcion`, `idActividad`, `idUsuario`) VALUES (NULL, '$descripcion', '$idActividad', '$idUsuario');";

		$resultado = mysqli_query($conn,$sql);  	
		echo json_encode($resultado);
		
        break;

        case 'consultarActividadesSocial': 
            # code...

        $idCultivo=$_REQUEST['idCultivo'];

        $sql = "SELECT actividades.idActividad, actividades.nombreActividad FROM actividades,usuario,agenda,cultivo WHERE usuario.idUsuario=actividades.idUsuario AND agenda.idUsuario=usuario.idUsuario AND agenda.idAgenda=actividades.idAgenda AND cultivo.idCultivo=agenda.idCultivo AND cultivo.idCultivo='$idCultivo'";

        $myArray = array();
                if ($resultado = mysqli_query($conn,$sql)) {
                 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    $a[] = array(
                        'idActividad' => $fila['idActividad'],
                        'nombreActividad' => $fila['nombreActividad'],
                        'nombreActividad' => $fila['nombreActividad']

                    );
                }       
                echo json_encode($a);
                }
        break;

        case 'consultarRetroalimentacion': 
            # code...

        $idActividad=$_REQUEST['idActividad'];

        $sql = "SELECT retroalimentacion.idRetroalimentacion, retroalimentacion.descripcion, retroalimentacion.idUsuario, usuario.pNombre FROM retroalimentacion,usuario,actividades WHERE retroalimentacion.idActividad=actividades.idActividad AND retroalimentacion.idUsuario=usuario.idUsuario AND actividades.idUsuario=usuario.idUsuario AND retroalimentacion.idActividad='$idActividad'";

        $myArray = array();
                if ($resultado = mysqli_query($conn,$sql)) {
                 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    $a[] = array(
                        'idRetroalimentacion' => $fila['idRetroalimentacion'],
                        'descripcion' => $fila['descripcion'],
                        'idUsuario' => $fila['idUsuario'],
                        'pNombre' => $fila['pNombre']

                    );
                }       
                echo json_encode($a);
                }
        break;

        case 'consultarComentariosSocial': 
            # code...

        $idRetroalimentacion=$_REQUEST['idRetroalimentacion'];

        $sql = "SELECT comentariosezpertos.comentario,usuario.pNombre FROM comentariosezpertos,usuario WHERE comentariosezpertos.idUsuario=usuario.idUsuario AND comentariosezpertos.idRetroalimentacion='$idRetroalimentacion'";

        $myArray = array();
                if ($resultado = mysqli_query($conn,$sql)) {
                 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    $a[] = array(
                        'comentario' => $fila['comentario'],
                        'pNombre' => $fila['pNombre']

                    );
                }       
                echo json_encode($a);
                }
        break;


        case 'insertarComenatrioSocial': 
            # code...

        $comentario=$_REQUEST['comentario'];
        $idRetroalimentacion=$_REQUEST['idRetroalimentacion'];
        $idUsuario=$_REQUEST['idUsuario'];

        $sql = "INSERT INTO `comentariosezpertos` (`idComentario`, `comentario`, `idRetroalimentacion`, `idUsuario`) VALUES (NULL, '$comentario', '$idRetroalimentacion', '$idUsuario');";

        $resultado = mysqli_query($conn,$sql);      
        echo json_encode($resultado);
        
        break;
    }


 ?>