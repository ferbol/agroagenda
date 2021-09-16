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

         case 'consultarCultivos1': 
            # code...
         $idRegion=$_REQUEST['idRegion'];

					$sql = "SELECT * FROM `cultivo` WHERE idRegion='$idRegion'";

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
					
					$sql = "SELECT cultivo.descripcion,region.nombreRegion FROM cultivo,region WHERE cultivo.nombreCultivo='$nombreCultivo' AND cultivo.idRegion=region.idRegion;";

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
			
			
		  case 'experienciasActualizar':
      # code...

      $idDetalleCultivo=$_REQUEST['idDetalleCultivo'];
      $tipoSemilla=$_REQUEST['tipoSemilla'];
      $abono=$_REQUEST['abono'];
      $procedimiento=$_REQUEST['procedimiento'];
      $comoSembrar=$_REQUEST['comoSembrar'];


          $sql = "UPDATE `detalleCultivo` SET `tipoSemilla` = '$tipoSemilla', `abono` = '$abono', `procedimiento` = '$procedimiento'
          , `comoSembrar` = '$comoSembrar' WHERE `detalleCultivo`.`idDetalleCultivo` = $idDetalleCultivo";

        if ($resultado = mysqli_query($conn,$sql)) {
          echo json_encode($resultado);
          }else{
            echo json_encode($resultado);
          }
      break;
      
       case 'experienciasCultivosAdmin':
			# code...

      $idUsuario=$_REQUEST['idUsuario'];

				$idCultivo=$_REQUEST['idCultivo'];

					$sql = "SELECT detalleCultivo.idDetalleCultivo,detalleCultivo.tipoSemilla,detalleCultivo.abono,detalleCultivo.procedimiento,detalleCultivo.comoSembrar,detalleCultivo.idUsuario FROM detalleCultivo,cultivo WHERE cultivo.idCultivo=detalleCultivo.idCultivo AND cultivo.idCultivo='$idCultivo' AND detalleCultivo.idUsuario='$idUsuario'";

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
			
			
			    case 'eliminarExperiencias':
      $idDetalleCultivo=$_REQUEST['idDetalleCultivo'];

      $sql="DELETE FROM `detalleCultivo` WHERE `detalleCultivo`.`idDetalleCultivo` = '$idDetalleCultivo'";

      if ($resultado = mysqli_query($conn,$sql)) {
        echo json_encode($resultado);
        }else{
          echo json_encode($resultado);
        }
      break;
      
      case 'agregarCultivoSuper':
      $idUsuario=$_REQUEST['idUsuario'];
      $nombreCultivo=$_REQUEST['nombreCultivo'];
      $descripcion=$_REQUEST['descripcion'];
      $idRegion=$_REQUEST['idRegion'];

      $sql="INSERT INTO `cultivo` (`idCultivo`, `nombreCultivo`, `descripcion`, `idRegion`, `idUsuario`)
      VALUES (NULL, '$nombreCultivo', '$descripcion', '$idRegion', '$idUsuario')";

      if ($resultado = mysqli_query($conn,$sql)) {
        echo json_encode($resultado);
        }else{
          echo json_encode($resultado);
        }
      break;

      case 'consultarCodigoAgenda':
      $idUsuario=$_REQUEST['idUsuario'];
      $nombreAgenda=$_REQUEST['nombreAgenda'];

      $sql="SELECT idAgenda FROM agenda WHERE nombreAgenda='$nombreAgenda' AND idUsuario='$idUsuario'";

      	$myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) {
				 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				 	$a[] = array(
				 		'idAgenda' => $fila['idAgenda']
					);
				}
			    echo json_encode($a);
			  	}else{
			  		echo json_encode($resultado);
			  	}
      break;


      case 'agregarActividad':
      $idUsuario=$_REQUEST['idUsuario'];
      $nombreActividad=$_REQUEST['nombreActividad'];
      $descripcionActividad=$_REQUEST['descripcionActividad'];
      $idAgenda=$_REQUEST['idAgenda'];

      $sql="INSERT INTO `actividades` (`idActividad`, `nombreActividad`, `descripcionActividad`, `idUsuario`, `idAgenda`) VALUES (NULL, '$nombreActividad', '$descripcionActividad', '$idUsuario', '$idAgenda');";

      if ($resultado = mysqli_query($conn,$sql)) {
        echo json_encode($resultado);
        }else{
          echo json_encode($resultado);
        }
      break;

      case 'consultarActividades':
      $idAgenda=$_REQUEST['idAgenda'];

      $sql="SELECT actividades.idActividad, actividades.nombreActividad, actividades.descripcionActividad FROM actividades, agenda WHERE actividades.idAgenda=agenda.idAgenda AND agenda.idAgenda='$idAgenda'";

      $myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) {
				 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				 	$a[] = array(
				 		'idActividad' => $fila['idActividad'],
				 		'nombreActividad' => $fila['nombreActividad'],
				 		'descripcionActividad' => $fila['descripcionActividad']
					);
				}
			    echo json_encode($a);
			  	}else{
			  		echo json_encode($resultado);
			  	}
      break;
 
 	case 'eliminarActividad':
      $idActividad=$_REQUEST['idActividad'];

      $sql="DELETE from actividades WHERE idActividad='$idActividad'";

      if ($resultado = mysqli_query($conn,$sql)) {
        echo json_encode($resultado);
        }else{
          echo json_encode($resultado);
        }
      break;






    }


	

?>
