function funcionAgregarUsuarios(txtNombreMateriaPrima,txtDescripcion,txtCantidad,txtUnidadMedida,txtPrecioUnitario,txtPrecioTotal) {


cadena="txtNombreMateriaPrima=" + txtNombreMateriaPrima +
		   "&txtDescripcion=" + txtDescripcion +
		   "&txtCantidad=" + txtCantidad +
		   "&txtUnidadMedida=" + txtUnidadMedida +
		   "&txtPrecioUnitario=" + txtPrecioUnitario +
		    "&txtPrecioTotal=" + txtPrecioTotal;
		    

	$.ajax({
		type:"POST",
		url:"agregar.php",
		data:cadena,

		success: function(msg){
			console.log(cadena);
			if(msg){

				$('#tablaCalcularCostos').load('calcularCostosTabla.php');
				alertify.success("Agregado Correctamente :)");
			}else{
				alertify.error("Error al Agregar :(");
			}
		}
	});
	
}
// TRAER LOS DATOS AL FORMULARIO DEL MODAL EDITAR
function agregarForm(datos){

	console.log(datos);
	d=datos.split('||');

	$('#txtIdMateriaPrimaEdit').val(d[0]);
    $('#txtNombreMateriaPrimaEdit').val(d[1]);
    $('#txtDescripcionEdit').val(d[2]);
    $('#txtCantidadEdit').val(d[3]);
          
	$("#txtUnidadMedidaEdit option").filter(function() {
	    return this.text == d[4]; 
	}).attr('selected', true);

    $('#txtPrecioUnitarioEdit').val(d[5]);
    $('#txtPrecioTotalEdit').val(d[6]);
   
	 
}
//ACTUALIZAR LOS DATOS EN EL MODAL EDITOR
function actualizarDatos(){

	//var sel=document.getElementById('selecTipoUsuarioEdit').options[document.getElementById('selecTipoUsuarioEdit').selectedIndex].text;

      txtIdMateriaPrimaEdit=$('#txtIdMateriaPrimaEdit').val();
      txtNombreMateriaPrimaEdit=$('#txtNombreMateriaPrimaEdit').val();
      txtDescripcionEdit=$('#txtDescripcionEdit').val();
      txtCantidadEdit=$('#txtCantidadEdit').val();
      txtUnidadMedidaEdit=$('#txtUnidadMedidaEdit').val();
      txtPrecioUnitarioEdit=$('#txtPrecioUnitarioEdit').val();
      txtPrecioTotalEdit=$('#txtPrecioTotalEdit').val();


	cadena="txtIdMateriaPrimaEdit=" + txtIdMateriaPrimaEdit + 
		  "&txtNombreMateriaPrimaEdit=" + txtNombreMateriaPrimaEdit +
		   "&txtDescripcionEdit=" + txtDescripcionEdit +
		    "&txtCantidadEdit=" + txtCantidadEdit+
		    "&txtUnidadMedidaEdit=" + txtUnidadMedidaEdit+
		    "&txtPrecioUnitarioEdit=" + txtPrecioUnitarioEdit+
		    "&txtPrecioTotalEdit=" + txtPrecioTotalEdit;

	$.ajax({
		type:"POST",
		url:"actualizar.php",
		data:cadena,
		success: function(msg){
			
			if(msg){
				$('#tablaCalcularCostos').load('calcularCostosTabla.php');
				alertify.success("Actualizado Correctamente :)");
			}else{
				alertify.error("Error al Actualizar :(");
			}
		}
	});

}

function preguntarSiNo(txtIdMateriaPrima){
	alertify.confirm('Eliminar datos', '¿Desea eliminar los datos?', 
		function(){ eliminarDatos(txtIdMateriaPrima) }
        , function(){ alertify.error('Se cancelo')});
}
function eliminarDatos(txtIdMateriaPrima){
	cadena="txtIdMateriaPrima=" + txtIdMateriaPrima;

	$.ajax({
		type:"POST",
		url:"eliminar.php",
		data:cadena,
		success: function(msg){
			if(msg){
				$('#tablaCalcularCostos').load('calcularCostosTabla.php');
				alertify.success("Eliminado Correctamente :)");
			}else{
				alertify.error("Error al Eliminar :(");
			}
		}
	});
}



