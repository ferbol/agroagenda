<?php


header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$pdo = new PDO("mysql:dbname=id6946000_serviciosandroid;host=localhost", "id6946000_otalvaro", "Th3napster");

//condicional if
$accion= (isset($_GET['accion']))?$_GET['accion']:'leer';
switch ($accion) {
	case 'agregar':
		//Instruccion de agregar
	$sentenciaSQL = $pdo->prepare("INSERT INTO actividadesAgenda(title,descripcion,color,textColor,start,end,idAgenda)
									VALUES(:title,:descripcion,:color,:textColor,:start,:end,:idAgenda)");
	$respuesta = $sentenciaSQL->execute(array(
	
		"title" => $_POST['title'],
		"descripcion" => $_POST['descripcion'],
		"color" => $_POST['color'],
		"textColor" => $_POST['textColor'],
		"start" => $_POST['start'],
		"end" => $_POST['end'],
		"idAgenda"=>$_POST['idAgenda']

	));
	echo json_encode($respuesta);
		break;
	
	case 'eliminar':
		//Instruccion de eliminar

	$respuesta = false;
	if(isset($_POST['id'])){
		$sentenciaSQL = $pdo->prepare("DELETE FROM actividadesAgenda WHERE ID=:ID");		
		$respuesta = $sentenciaSQL->execute(array("ID"=>$_POST['id']));
	}
	echo json_encode($respuesta);

		break;
	
	case 'modificar':
	
		//Instruccion de modificar
	$sentenciaSQL = $pdo->prepare("UPDATE actividadesAgenda SET 
										title=:title,
										descripcion=:descripcion,
										color=:color,
										textColor=:textColor,
										start=:start,
										end=:end
										WHERE ID=:ID");

	$respuesta = $sentenciaSQL->execute(array(
		"ID"=>$_POST['id'],
		"title" => $_POST['title'],
		"descripcion" => $_POST['descripcion'],
		"color" => $_POST['color'],
		"textColor" => $_POST['textColor'],
		"start" => $_POST['start'],
		"end" => $_POST['end']

	));
	echo json_encode($respuesta);
		break;

		case 'datosdf':
		//Instruccion de modificar
		$idAgenda=$_REQUEST['idAgenda'];
	$sentenciaSQL = $pdo->prepare("SELECT * FROM actividadesAgenda
										WHERE idAgenda=$idAgenda");

	$sentenciaSQL->execute();
	$resultado = $sentenciaSQL->fetchALL(PDO::FETCH_ASSOC);
	echo json_encode($resultado);
		break;


	
	
}



?>