
 <?php
	/*
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "agro_agenda";//nombre de la Base de Datos
	*/

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "id6946000_serviciosandroid";//nombre de la Base de Datos

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_query($conn,"SET NAMES 'utf8'");

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	
?>