<?php

include("../php/conexionMYSQL.php");


$txtIdMateriaPrimaEdit=$_POST['txtIdMateriaPrimaEdit'];

$txtNombreMateriaPrimaEdit=$_POST['txtNombreMateriaPrimaEdit'];
$txtDescripcionEdit=$_POST['txtDescripcionEdit'];
$txtCantidadEdit=$_POST['txtCantidadEdit'];
$txtUnidadMedidaEdit=$_POST['txtUnidadMedidaEdit'];
$txtPrecioUnitarioEdit=$_POST['txtPrecioUnitarioEdit'];
$txtPrecioTotalEdit=$_POST['txtPrecioTotalEdit'];



$query="UPDATE materiaprima SET nombre='$txtNombreMateriaPrimaEdit',
						   descripcion='$txtDescripcionEdit',
						   cantidad='$txtCantidadEdit',
						   unidad='$txtUnidadMedidaEdit',
						   preciounitario='$txtPrecioUnitarioEdit',
						   preciototal='$txtPrecioTotalEdit'
		WHERE id='$txtIdMateriaPrimaEdit'";


$resultado=mysqli_query($conn,$query);


  
?>
