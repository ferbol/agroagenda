<?php 

	include("../php/conexionMYSQL.php");


$txtIdPlaga=$_POST['txtIdPlaga'];

 $query="DELETE FROM plagas where idPlaga='$txtIdPlaga'";
 echo $resultado = mysqli_query($conn,$query);

 ?>