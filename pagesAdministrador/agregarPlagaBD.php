<?php

include("../php/conexionMYSQL.php");


//$idPlaga=$_POST['txtIdPlaga'];
$nombrePlaga=$_POST['txtNombrePlaga'];
$plaguicida=$_POST['txtPlaguicida'];
$tratamiento=$_POST['txtTratamiento'];


$query="INSERT INTO plagas (idPlaga,nombrePlaga,plaguicida,tratamiento) VALUES(NULL,'$nombrePlaga','$plaguicida','$tratamiento');";

$resultado=mysqli_query($conn,$query);



  
?>
