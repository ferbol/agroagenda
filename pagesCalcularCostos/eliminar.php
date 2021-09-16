<?php 

	include("../php/conexionMYSQL.php");


$txtIdMateriaPrima=$_POST['txtIdMateriaPrima'];

 $query="DELETE FROM materiaprima where id='$txtIdMateriaPrima'";
 echo $resultado = mysqli_query($conn,$query);

 ?>