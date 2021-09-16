<?php

include("../php/conexionMYSQL.php");


//$idPlaga=$_POST['txtIdPlaga'];
$txtNombreMateriaPrima=$_POST['txtNombreMateriaPrima'];
$txtDescripcion=$_POST['txtDescripcion'];
$txtCantidad=$_POST['txtCantidad'];
$txtUnidadMedida=$_POST['txtUnidadMedida'];
$txtPrecioUnitario=$_POST['txtPrecioUnitario'];
$txtPrecioTotal=$_POST['txtPrecioTotal'];


$query="INSERT INTO materiaprima (id,nombre,descripcion,cantidad,unidad,preciounitario,preciototal) VALUES(NULL,'$txtNombreMateriaPrima','$txtDescripcion','$txtCantidad','$txtUnidadMedida','$txtPrecioUnitario','$txtPrecioTotal');";

$resultado=mysqli_query($conn,$query);



  
?>
