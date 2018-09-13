<?php

    header("Access-Control-Allow-Origin: *");	
	include '../php/conexionMYSQL.php';	
    $accion=$_REQUEST['accion'];
    

    switch($accion){
        case 'insertarCultivoSuperU': 
            # code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];
				
				$nombreCultivo=$_REQUEST['nombreCultivo'];
				$idRegion=$_REQUEST['idRegion'];
				$descripcion=$_REQUEST['descripcion'];				
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "INSERT INTO `cultivo` (`idCultivo`, `nombreCultivo`, `descripcion`,`idRegion`, `idUsuario`) VALUES (NULL, '$nombreCultivo', '$descripcion','$idRegion', '$idUsuario')";
					if($resultado = mysqli_query($conn,$sql)){

						  	echo json_encode($resultado);

					}				
				}
        break;


        case 'insertarDetalleCultivo': 
            # code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];
				
				$nombreCultivo=$_REQUEST['nombreCultivo'];
				$tipoSemilla=$_REQUEST['tipoSemilla'];
				$abono=$_REQUEST['abono'];				
				$procedimiento=$_REQUEST['procedimiento'];
				$comoSembrar=$_REQUEST['comoSembrar']; 
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "SELECT cultivo.idCultivo FROM cultivo WHERE cultivo.nombreCultivo='$nombreCultivo';";

					$idCultivo;
						if ($resultado = mysqli_query($conn,$sql)) {
					 		while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){				 			
								$idCultivo=$fila['idCultivo']	;							
							}    	
							
							$sql="INSERT INTO `detalleCultivo` (`idDetalleCultivo`,`idCultivo`,`idUsuario`,`tipoSemilla`,`abono`,`procedimiento`,`comoSembrar`) VALUES (NULL,'$idCultivo','$idUsuario','$tipoSemilla','$abono','$procedimiento','$comoSembrar')";

							if($resultado = mysqli_query($conn,$sql)){
								echo $resultado;
							}

			  			}else{
			  				echo "error al obtener codigo de cultivo";
			  			}
				
				}
        break;


         case 'consultarCultivos': 
            # code...
					
					$sql = "SELECT * FROM `cultivo`";

					if($resultado = mysqli_query($conn,$sql)){

						$myArray = array();
						while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
						 	$a[] = array(
								'idCultivo' => $fila['idCultivo'],
								'nombreCultivo' => $fila['nombreCultivo'],
								'descripcion' => $fila['descripcion'],
								'idRegion' => $fila['idRegion'],
								'idUsuario' => $fila['idUsuario']
							);
						}
						echo json_encode($a);

					}	else{ echo "error al consultar cultivos ";	}			
			break;


		 case 'consultarDescripcion': 
            # code...

		 			$nombreCultivo=$_REQUEST['nombreCultivo'];
					
					$sql = "SELECT cultivo.descripcion,region.nombreRegion FROM cultivo,region WHERE cultivo.nombreCultivo='$nombreCultivo' AND cultivo.idRegion=region.idRegion";

					if($resultado = mysqli_query($conn,$sql)){

						$myArray = array();
						while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
						 	$a[] = array(
								'descripcion' => $fila['descripcion'],
								'region' => $fila['nombreRegion']
							);
						}
						echo json_encode($a);

					}	else{ echo "error al consultar cultivos ";	}			
			break;


			case 'cultivosRecomendados':
			# code...
				
				$idRegion=$_REQUEST['idRegion'];

					$sql = "SELECT cultivo.idCultivo,cultivo.nombreCultivo,cultivo.descripcion FROM cultivo WHERE cultivo.idRegion='$idRegion'";
				
					$myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) {
				 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				 	$a[] = array(
				 		'idCultivo' => $fila['idCultivo'],
						'nombreCultivo' => $fila['nombreCultivo'],
						'descripcion' => $fila['descripcion']
					);
				}    	
			    echo json_encode($a);
			  	}else{
			  		echo json_encode($resultado);
			  	}
				
			break;


			case 'experienciasCultivos':
			# code...
				
				$idCultivo=$_REQUEST['idCultivo'];
				
					$sql = "SELECT detalleCultivo.idDetalleCultivo,detalleCultivo.tipoSemilla,detalleCultivo.abono,detalleCultivo.procedimiento,detalleCultivo.comoSembrar,detalleCultivo.idUsuario FROM detalleCultivo,cultivo WHERE cultivo.idCultivo=detalleCultivo.idCultivo AND cultivo.idCultivo='$idCultivo'";
				
					$myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) {
				 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				 	$a[] = array(
				 		'idDetalleCultivo' => $fila['idDetalleCultivo'],
						'tipoSemilla' => $fila['tipoSemilla'],
						'abono' => $fila['abono'],
						'procedimiento' => $fila['procedimiento'],
						'comoSembrar' => $fila['comoSembrar'],
						'idUsuario' => $fila['idUsuario']
					);
				}    	
			    echo json_encode($a);
			  	}else{
			  		echo json_encode($resultado);
			  	}
				
			break;




    }


	

?>
