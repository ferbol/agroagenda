<?php 
    header("Access-Control-Allow-Origin: *");
	
	include '../php/conexionMYSQL.php';
	
	$accion=$_REQUEST['accion'];
	

	switch ($accion) {

		//verifica si el usuario esta registrado en la base de datos y devuelve el tipo de usuario que es..
		case 'login':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";
				
				$myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) {
				 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				 	$a[] = array(
						'tipo' => $fila['tipoUsuario']
					);
				}    	
			    echo json_encode($a);
			  	}

			break;

		//consulta todas las agendas correspondientes al usuario logueado..
		case 'agendas':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "SELECT * FROM agenda WHERE agenda.idUsuario='$idUsuario'";
				
				$myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) {
				 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				 	$a[] = array(
						'IdAgenda' => $fila['idAgenda'],
						'Nombre Agenda' => $fila['nombreAgenda'],
						'Comentarios' => $fila['comentario']
					);
				}    	
			    echo json_encode($a);
			  	}


				}

				

			break;
			
		case 'agendasEmpleados':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "SELECT agenda.idAgenda,agenda.nombreAgenda,agenda.comentario FROM agenda,usuario,trabajadores WHERE  trabajadores.idEmpleado=agenda.idUsuario AND trabajadores.idAdministrador='$idUsuario' and usuario.idUsuario='$idUsuario'";
				
				$myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) {
				 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				 	$a[] = array(
						'idAgenda' => $fila['idAgenda'],
						'NombreAgenda' => $fila['nombreAgenda'],
						'Comentarios' => $fila['comentario']
					);
				}    	
			    echo json_encode($a);
			  	}else{
			  		echo json_encode($resultado);
			  	}
				}			

			break;
			
		case 'agendasAdministrador':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "SELECT * FROM agenda WHERE idusuario='$idUsuario'";
				
				$myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) {
				 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				 	$a[] = array(
						'idAgenda' => $fila['idAgenda'],
						'NombreAgenda' => $fila['nombreAgenda'],
						'Comentarios' => $fila['comentario']
					);
				}    	
			    echo json_encode($a);
			  	}else{
			  		echo json_encode($resultado);
			  	}
				}			

			break;
			
		case 'registroAdministrador':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$pNombre=$_REQUEST['pNombre'];
				$sNombre=$_REQUEST['sNombre'];
				$pApellido=$_REQUEST['pApellido'];
				$sApellido=$_REQUEST['sApellido'];
				$sexo=$_REQUEST['sexo'];
				$edad=$_REQUEST['edad'];
				$tipoUsuario=$_REQUEST['tipoUsuario'];
				$password=$_REQUEST['password'];

				
				$sql = "INSERT INTO `usuario` (`idUsuario`, `pNombre`, `sNombre`, `pApellido`, `sApellido`, `sexo`, `edad`, `tipoUsuario`) VALUES ('$idUsuario', '$pNombre', '$sNombre', '$pApellido', '$sApellido', '$sexo', '$edad', '$tipoUsuario');";

				if($resultado = mysqli_query($conn,$sql)){
					$sql1="INSERT INTO `login` (`idUsuario`, `password`) VALUES ('$idUsuario', '$password')";
					$resultado1=mysqli_query($conn,$sql1);
					echo json_encode($resultado1);
				}else{
					echo json_encode($resultado);
				}
			    		

			break;
			
			
			case 'eliminarAgenda':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];
				$idAgenda=$_REQUEST['idAgenda'];
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "DELETE FROM `agenda` WHERE `agenda`.`idAgenda` ='$idAgenda'";
				
				$resultado = mysqli_query($conn,$sql);  	
			    echo json_encode($resultado);			  	
				}else{
				echo json_encode($resultado);
				}		

			break;
		
		case 'actualizarAgenda':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];
				$idAgenda=$_REQUEST['idAgenda'];
				$nombreAgenda=$_REQUEST['nombreAgenda'];
				$comentario=$_REQUEST['comentario'];
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "UPDATE `agenda` SET `nombreAgenda` = '$nombreAgenda', `comentario` = '$comentario' WHERE `agenda`.`idAgenda` = '$idAgenda'";
				
				$resultado = mysqli_query($conn,$sql);  	
			    echo json_encode($resultado);			  	
				}else{
				echo json_encode($resultado);
				}		

			break;
		
		case 'crearAgenda':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];
				$idAgenda=$_REQUEST['idAgenda'];
				$nombreAgenda=$_REQUEST['nombreAgenda'];
				$comentario=$_REQUEST['comentario'];
				$idCultivo=$_REQUEST['idCultivo'];
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "INSERT INTO `agenda` (`idAgenda`, `nombreAgenda`, `comentario`, `idUsuario`, `idCultivo`) VALUES (NULL, '$nombreAgenda', '$comentario', '$idUsuario','$idCultivo')";
				
				$resultado = mysqli_query($conn,$sql);  	
			    echo json_encode($resultado);			  	
				}else{
				echo json_encode($resultado);
				}		

			break;
			
case 'listarUsuarios':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "SELECT usuario.idUsuario,usuario.pNombre,usuario.sNombre,usuario.pApellido,usuario.sApellido,usuario.sexo,usuario.edad FROM usuario,trabajadores WHERE usuario.idUsuario=trabajadores.idEmpleado and trabajadores.idAdministrador='$idUsuario'";
				
				$myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) {
				 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				 	$a[] = array(
						'idUsuario' => $fila['idUsuario'],
						'pNombre' => $fila['pNombre'],
						'sNombre' => $fila['sNombre'],
						'pApellido' => $fila['pApellido'],
						'sApellido' => $fila['sApellido'],
						'sexo' => $fila['sexo'],
						'edad' => $fila['edad']
					);
				}    	
			    echo json_encode($a);
			  	}else{
			  		echo json_encode($resultado);
			  	}
				}
			break;
			
		case 'cambiarPassword':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];

				$idUsuario1=$_REQUEST['idUsuario1'];
				$password1=$_REQUEST['password1'];
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "UPDATE `login` SET `password` = '$password1' WHERE `login`.`idUsuario` ='$idUsuario1'";
				
				$myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) {   	
			    echo json_encode($a);
			  	}else{
			  		echo json_encode($resultado);
			  	}
				}
			break;
			
			
	case 'actualizarUsuario':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];

				$idUsuario1=$_REQUEST['idUsuario1'];
				$pNombre=$_REQUEST['pNombre'];
				$sNombre=$_REQUEST['sNombre'];
				$pApellido=$_REQUEST['pApellido'];
				$sApellido=$_REQUEST['sApellido'];
				$sexo=$_REQUEST['sexo'];
				$edad=$_REQUEST['edad'];
				$tipoUsuario=$_REQUEST['tipoUsuario'];
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "UPDATE `usuario` SET  `pNombre` = '$pNombre', `sNombre` = '$sNombre', `pApellido` = '$pApellido', `sApellido` = '$sApellido', `sexo` = '$sexo', `edad` = '$edad', `tipoUsuario` = '$tipoUsuario' WHERE `usuario`.`idUsuario` = '$idUsuario1'";
				
				$myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) {   	
			    echo json_encode($a);
			  	}else{
			  		echo json_encode($resultado);
			  	}
				}
			break;
			
			
		case 'agregarUsuarios':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];

				$idUsuario1=$_REQUEST['idUsuario1'];
				$pNombre=$_REQUEST['pNombre'];
				$sNombre=$_REQUEST['sNombre'];
				$pApellido=$_REQUEST['pApellido'];
				$sApellido=$_REQUEST['sApellido'];
				$sexo=$_REQUEST['sexo'];
				$edad=$_REQUEST['edad'];
				$tipoUsuario=$_REQUEST['tipoUsuario'];
				$password1=$_REQUEST['password1'];
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "INSERT INTO `usuario` (`idUsuario`, `pNombre`, `sNombre`, `pApellido`, `sApellido`, `sexo`, `edad`, `tipoUsuario`) VALUES ('$idUsuario1', '$pNombre', '$sNombre', '$pApellido', '$sApellido', '$sexo', '$edad', '$tipoUsuario')";
				
				$myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) { 
					$sql="INSERT INTO `login` (`idUsuario`, `password`) VALUES ('$idUsuario1', '$password1')";
					if($resultado=mysqli_query($conn,$sql)){
						$sql="INSERT INTO `trabajadores` (`id`, `idAdministrador`, `idEmpleado`) VALUES (NULL, '$idUsuario', '$idUsuario1')";

						if($resultado=mysqli_query($conn,$sql)){
							echo json_encode($resultado);
						}
					} 	
			    echo json_encode($resultado);
			  	}else{
			  		echo json_encode($resultado);
			  	}
				}
			    		

			break;
			
			case 'eliminarUsuario':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];

				$idUsuario1=$_REQUEST['idUsuario1'];

				$sql = "SELECT trabajadores.id FROM trabajadores WHERE trabajadores.idAdministrador='$idUsuario' AND trabajadores.idEmpleado='$idUsuario1';";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "DELETE FROM `login` WHERE `login`.`idUsuario` = '$idUsuario1'";

				if ($resultado = mysqli_query($conn,$sql)) {
					$sql="DELETE FROM `trabajadores` WHERE `trabajadores`.`idEmpleado` = '$idUsuario1'";

					if($resultado = mysqli_query($conn,$sql)){
						$sql="DELETE FROM `agenda` WHERE `agenda`.`idUsuario` = '$idUsuario1'";

						if($resultado = mysqli_query($conn,$sql)){
							$sql="DELETE FROM `cultivo` WHERE `cultivo`.`idUsuario` = '$idUsuario1'";

							if($resultado = mysqli_query($conn,$sql)){
								$sql="DELETE FROM `usuario` WHERE `usuario`.`idUsuario` = '$idUsuario1'";
								if($resultado = mysqli_query($conn,$sql)){
										echo json_encode($resultado);
								}else{
									echo json_encode($resultado);
								}
							}else{

								$sql="DELETE FROM `usuario` WHERE `usuario`.`idUsuario` = '$idUsuario1'";
								if($resultado = mysqli_query($conn,$sql)){
										echo json_encode($resultado);
								}else{
									echo json_encode($resultado);
								}

							}

						}
					}

			  	}else{
			  		echo json_encode($resultado);
			  	}
				}
			break;
		
	case 'cultivosRecomendados':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];

				$idRegion=$_REQUEST['idRegion'];
				
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "SELECT cultivo.idCultivo,cultivo.nombreCultivo,cultivo.descripcion,cultivo.tipoSemilla,cultivo.procedimiento,cultivo.comoSembrar FROM cultivo WHERE cultivo.idRegion='$idRegion'";
				
					$myArray = array();
				if ($resultado = mysqli_query($conn,$sql)) {
				 while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				 	$a[] = array(
				 	    'idCultivo' => $fila['idCultivo'],
						'nombreCultivo' => $fila['nombreCultivo'],
						'descripcion' => $fila['descripcion'],
						'tipoSemilla' => $fila['tipoSemilla'],
						'procedimiento' => $fila['procedimiento'],
						'comoSembrar' => $fila['comoSembrar']
					);
				}    	
			    echo json_encode($a);
			  	}else{
			  		echo json_encode($resultado);
			  	}
				}
			break;

			case 'InsertarCultivo':
			# code...
				$idUsuario=$_REQUEST['idUsuario'];
				$password=$_REQUEST['password'];
				
				$nombreCultivo=$_REQUEST['nombreCultivo'];
				$descripcion=$_REQUEST['descripcion'];
				$idRegion=$_REQUEST['idRegion'];
				$idUsuario=$_REQUEST['idUsuario'];

				$tipoSemilla=$_REQUEST['tipoSemilla'];
				$procedimiento=$_REQUEST['procedimiento'];
				$comoSembrar=$_REQUEST['comoSembrar'];				
				
				$sql = "SELECT usuario.tipoUsuario FROM usuario, login WHERE login.idUsuario='$idUsuario' and usuario.idUsuario='$idUsuario' and login.password='$password'";

				if ($resultado = mysqli_query($conn,$sql)) {

					$sql = "INSERT INTO `cultivo` (`idCultivo`, `nombreCultivo`, `descripcion`,`tipoSemilla`,`procedimiento`,`comoSembrar`, `idRegion`, `idUsuario`) VALUES (NULL, '$nombreCultivo', '$descripcion',  '$tipoSemilla', '$procedimiento', '$comoSembrar','$idRegion', '$idUsuario')";
					if($resultado = mysqli_query($conn,$sql)){

						  	echo json_encode($resultado);

					}
				
				}
			break;



		default:
			# code...
			break;
	}
    
    $conn->close();
 ?>