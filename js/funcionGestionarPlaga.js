function funcionAgregarUsuarios(txtNombrePlaga,txtPlaguicida,txtTratamiento) {


cadena="txtNombrePlaga=" + txtNombrePlaga +
		   "&txtPlaguicida=" + txtPlaguicida +
		    "&txtTratamiento=" + txtTratamiento;
		    

	$.ajax({
		type:"POST",
		url:"../pagesAdministrador/agregarPlagaBD.php",
		data:cadena,

		success: function(msg){
			console.log(cadena);
			if(msg){

				$('#tablaPlagas').load('../pagesAdministrador/gestionarPlagasTabla.php');
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

	$('#txtIdPlagaEdit').val(d[0]);
    $('#txtNombrePlagaEdit').val(d[1]);
    $('#txtPlaguicidaEdit').val(d[2]);
    $('#txtTratamientoEdit').val(d[3]);
    console.log($('#txtIdPlagaEdit').val());
	 
}
//ACTUALIZAR LOS DATOS EN EL MODAL EDITOR
function actualizarDatos(){

	//var sel=document.getElementById('selecTipoUsuarioEdit').options[document.getElementById('selecTipoUsuarioEdit').selectedIndex].text;

      txtIdPlagaEdit=$('#txtIdPlagaEdit').val();
      txtNombrePlagaEdit=$('#txtNombrePlagaEdit').val();
      txtPlaguicidaEdit=$('#txtPlaguicidaEdit').val();
      txtTratamientoEdit=$('#txtTratamientoEdit').val();
console.log($('#txtIdPlagaEdit').val());

	cadena="txtIdPlagaEdit=" + txtIdPlagaEdit + 
		  "&txtNombrePlagaEdit=" + txtNombrePlagaEdit +
		   "&txtPlaguicidaEdit=" + txtPlaguicidaEdit +
		    "&txtTratamientoEdit=" + txtTratamientoEdit;

	$.ajax({
		type:"POST",
		url:"../pagesAdministrador/actualizarPlagaBD.php",
		data:cadena,
		success: function(msg){
			
			if(msg){
				$('#tablaPlagas').load('../pagesAdministrador/gestionarPlagasTabla.php');
				alertify.success("Actualizado Correctamente :)");
			}else{
				alertify.error("Error al Actualizar :(");
			}
		}
	});

}

function preguntarSiNo(txtIdPlaga){
	alertify.confirm('Eliminar datos', '¿Desea eliminar los datos?', 
		function(){ eliminarDatos(txtIdPlaga) }
        , function(){ alertify.error('Se cancelo')});
}
function eliminarDatos(txtIdPlaga){
	cadena="txtIdPlaga=" + txtIdPlaga;

	$.ajax({
		type:"POST",
		url:"../pagesAdministrador/eliminarPlagaBD.php",
		data:cadena,
		success: function(msg){
			if(msg){
				$('#tablaPlagas').load('../pagesAdministrador/gestionarPlagasTabla.php');
				alertify.success("Eliminado Correctamente :)");
			}else{
				alertify.error("Error al Eliminar :(");
			}
		}
	});
}



