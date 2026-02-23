document.addEventListener('DOMContentLoaded', function(){
	eventos();
});

function eventos() {
	obtenerData();

	let btnGuardar =  document.querySelector('#btnGuardar');
	let btnLimpiar = document.querySelector('#btnLimpiar');

	btnGuardar.addEventListener('click', function() {
		if(btnGuardar.textContent == "Guardar") {
			if(!validar()) {
				alert("Por favor llenar todos los campos");
				return;
			}
			guardar();
		}else {
			modificar();
		}
	});

	btnLimpiar.addEventListener('click', function() {
		limpiar();
	});
}

function eliminar() {
	$.ajax({
		dataType: "json",
		method:"POST",
		url: "../../api/request.php",
		data: {
			codigo: $("#codigo").val()
		},
		success: (result) => {
			console.log(result);
		},
		error: () => {
			console.log("Error petición ajax");
		}
	});
}

function modificar() {
	let usuario = {
		codigo: $("#codigo_usuario").val(),
		email: $("#email").val(),
		password: $("#password").val()
	}

	let persona = {
		codigo: $("#codigo_persona").val(),
		nombre: $("#nombre").val(),
		apellido: $("#apellido").val(),
		nit: $("#nit").val(),
		dui: $("#dui").val(),
		direccion: $("#direccion").val(),
		fecha: $("#fecha").val(),
		telefono: $("#telefono").val(),	
		usuario: usuario
	};

	let data = {
		accion: btoa("modificar"),
		persona: persona
	};

	$.ajax({
		dataType: "json",
		method:"POST",
		url: "../../api/request.php",
		data: data,
		success: (result) => {
			limpiar();
			obtenerData();
		},
		error: (xhr) => {
    	console.log("STATUS:", xhr.status);
    	console.log("RESPUESTA:", xhr.responseText);
		}
	});
}

function guardar() {

	let usuario = {
		codigo: $("#codigo_usuario").val(),
		email: $("#email").val(),
		password: $("#password").val()
	}

	let persona = {
		codigo: $("#codigo_persona").val(),
		nombre: $("#nombre").val(),
		apellido: $("#apellido").val(),
		nit: $("#nit").val(),
		dui: $("#dui").val(),
		direccion: $("#direccion").val(),
		fecha: $("#fecha").val(),
		telefono: $("#telefono").val(),	
		usuario: usuario
	};

	let data = {
		accion: btoa("guardar"),
		persona: persona
	}

	$.ajax({
		dataType: "json",
		method:"POST",
		url: "../../api/request.php",
		data: data,
		success: (result) => {
			limpiar();
			obtenerData();
		},
		error: (xhr) => {
    	console.log("STATUS:", xhr.status);
    	console.log("RESPUESTA:", xhr.responseText);
		}
	});
}

function obtenerData() {
	$.ajax({
		dataType: "json",
		method: "POST",
		url: "../../api/request.php",
		data: {
			accion: btoa("listar")
		},
		success: (result) => {
			console.log(result);

			llenarTabla(result);
		},
		error: (result) => {
			console.log("Error petición ajax");
		}
	});
}

function llenarTabla(data) {
	let tabla = document.querySelector("#tabla-contenido");

	tabla.innerHTML = " ";

	data.forEach(function(persona) {
		let fila = document.createElement('TR');
		let codigo = document.createElement('TD');
		let nombre = document.createElement('TD');
		let dui = document.createElement('TD');
		let nit= document.createElement('TD');
		let correo = document.createElement('TD');
		let acciones = document.createElement('TD');

		let btnEditar = document.createElement('BUTTON');
		let btnEliminar = document.createElement('BUTTON');

		codigo.textContent = persona.codigo_persona;
		nombre.textContent = persona.nombre + " " + persona.apellido;
		dui.textContent = persona.dui;
		nit.textContent = persona.nit;
		correo.textContent = persona.email;

		acciones.innerHTML = '<button class="btn btn-info m-2" onclick="mostrarDatos(\'' + persona.codigo_persona +'\')">Editar</button> <button class="btn btn-danger" onclick="eliminar(\'' + persona.codigo_persona + '\',\'' + persona.codigo_usuario + '\')">Eliminar</button>';

		fila.appendChild(codigo);
		fila.appendChild(nombre);
		fila.appendChild(dui);
		fila.appendChild(nit);
		fila.appendChild(correo);
		fila.appendChild(acciones);

		tabla.appendChild(fila);
    });
}

function mostrarDatos(code) {
	$.ajax({
		dataType: "json",
		method: "POST",
		url: "../../api/request.php",
		data: {
			accion: btoa("buscar"),
			codigo: btoa(code)
		},
		success: (result) => {
			llenarFormulario(result);
		},
		error: (result) => {
			console.log("Error petición ajax");
		}
	});
}

function llenarFormulario(data) {
	$("#nombre").val(data.nombre);
	$("#apellido").val(data.apellido);
	$("#dui").val(data.dui);
	$("#nit").val(data.nit);
	$("#direccion").val(data.direccion);
	$("#telefono").val(data.telefono);
	$("#fecha").val(data.fecha);
	$("#email").val(data.email);

	$("#codigo_persona").val(data.codigo_persona);
	$("#codigo_usuario").val(data.codigo_usuario);

	$("#btnGuardar").text("Modificar");
}

function limpiar() {
	$("#nombre").val("");
	$("#apellido").val("");
	$("#dui").val("");
	$("#nit").val("");
	$("#direccion").val("");
	$("#telefono").val("");
	$("#fecha").val("");
	$("#email").val("");
	$("#password").val("");

	$("#codigo_persona").val("");
	$("#codigo_usuario").val("");

	$("#btnGuardar").text("Guardar");
}

function eliminar(code_persona, code_usuario) {

	$.ajax({
		dataType: "json",
		method: "POST",
		url: "../../api/request.php",
		data: {
			accion: btoa("eliminar"),
			codigo: btoa(code_persona),
			codigo_usuario: btoa(code_usuario)
		},
		success: (result) => {
			console.log(result);
			obtenerData();
		},
		error: (xhr) => {
    	console.log("STATUS:", xhr.status);
    	console.log("RESPUESTA:", xhr.responseText);
		}
	});
}

function validar() {
	const inputs = document.querySelectorAll(".validar");

	for(let i = 0; i < inputs.length-1; i++) {
		if(inputs[i].value === "") {
			return false;
		}
	}
	return true;
}