var agenda,registrarse,iniciarSesion,cerrarSesion,menuAdministrador,menuEmpleado,agregarCultivo,agregarSuper,agregarExpeAdmin,btnagregarcomentario;



function stylosSesiones(){


	if(sessionStorage.getItem("3")=="administrador"){
		agenda="block";
		registrarse="none";
		cerrarSesion="block";
		iniciarSesion="none";
		menuEmpleado="none";
		menuAdministrador="block";
		agregarCultivo="block";
		agregarSuper="none";
		agregarExpeAdmin="block";
		btnagregarcomentario="block";

	}else if(sessionStorage.getItem("3")=="trabajador"){
		agenda="block";
		registrarse="none";
		cerrarSesion="block";
		iniciarSesion="none";
		menuEmpleado="block";
		menuAdministrador="none";
		agregarCultivo="none";
		agregarSuper="none";
		agregarExpeAdmin="none";
		btnagregarcomentario="none";

	}else if(sessionStorage.getItem("3")=="superAdmin"){
		agenda="block";
		registrarse="none";
		cerrarSesion="block";
		iniciarSesion="none";
		menuEmpleado="none";
		menuAdministrador="block";
		agregarCultivo="block";
		agregarSuper="block";
		agregarExpeAdmin="none";
		btnagregarcomentario="block";

	}else{
		agenda="none";
		registrarse="block";
		cerrarSesion="none";
		iniciarSesion="block";
		menuEmpleado="none";
		menuAdministrador="none";
		agregarCultivo="none";
		agregarSuper="none";
		agregarExpeAdmin="none";
		btnagregarcomentario="none";
	}

}







function CerrarSesion(){
	sessionStorage.removeItem("1");
	sessionStorage.removeItem("2");
	sessionStorage.removeItem("3");
	sessionStorage.removeItem("4");
	location.reload(true);
}