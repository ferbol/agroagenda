<?php

include("../php/conexionMYSQL.php");


$txtIdPlagaEdit=$_POST['txtIdPlagaEdit'];
$txtNombrePlagaEdit=$_POST['txtNombrePlagaEdit'];
$txtPlaguicidaEdit=$_POST['txtPlaguicidaEdit'];
$txtTratamientoEdit=$_POST['txtTratamientoEdit'];



$query="UPDATE plagas SET nombrePlaga='$txtNombrePlagaEdit',
						   plaguicida='$txtPlaguicidaEdit',
						   tratamiento='$txtTratamientoEdit' 
		WHERE idPlaga='$txtIdPlagaEdit'";


$resultado=mysqli_query($conn,$query);


  
?>
