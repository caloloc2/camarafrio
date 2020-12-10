// var server = 'http://localhost/camarafrio/'; 
var server = 'http://camaradefrio.nibemi.com/';

function Consulta_Temperaturas(fields, callback){
    $.ajax({
        url: server+'php/get_values.php',
        type: 'POST',
        data: fields,
		dataType: 'json',
		success: function(datos){
            if (typeof callback === "function") {
                callback(datos);
            }
        },
		error: function(e){
			if (typeof callback === "function") {
                callback(e);
            }
		}
    });   
}

function Consulta_Usuarios(callback){
    $.ajax({
        url: server+'php/get_users.php',                
		dataType: 'json',
		success: function(datos){
            if (typeof callback === "function") {
                callback(datos);
            }
        },
		error: function(e){
			if (typeof callback === "function") {
                callback(e);
            }
		}
    });   
}

function Consulta_Notificacion(callback){
    $.ajax({
        url: server+'php/get_notificacion.php',                
		dataType: 'json',
		success: function(datos){
            if (typeof callback === "function") {
                callback(datos);
            }
        },
		error: function(e){
			if (typeof callback === "function") {
                callback(e);
            }
		}
    });   
}

function Umbral(callback){
    $.ajax({
        url: server+'php/umbral.php',                
		dataType: 'json',
		success: function(datos){
            if (typeof callback === "function") {
                callback(datos);
            }
        },
		error: function(e){
			if (typeof callback === "function") {
                callback(e);
            }
		}
    });   
}

function Login(fields, callback){
    $.ajax({
        url: server+'php/login.php',
        type: 'POST',
        data: fields,
		dataType: 'json',
		success: function(datos){
            if (typeof callback === "function") {
                callback(datos);
            }
        },
		error: function(e){
			if (typeof callback === "function") {
                callback(e);
            }
		}
    });   
}

function Delete(fields, module, callback){
    $.ajax({
        url: server+'php/delete.php',
        type: 'POST',
        data: {
            fields,
            module
        },
		dataType: 'json',
		success: function(datos){
            if (typeof callback === "function") {
                callback(datos);
            }
        },
		error: function(e){
			if (typeof callback === "function") {
                callback(e);
            }
		}
    });   
}

function Create(fields, module, callback){
    $.ajax({
        url: server+'php/create.php',
        type: 'POST',
        data: {
            fields,
            module
        },
		dataType: 'json',
		success: function(datos){
            if (typeof callback === "function") {
                callback(datos);
            }
        },
		error: function(e){
			if (typeof callback === "function") {
                callback(e);
            }
		}
    });   
}

function Update(fields, module, callback){
    $.ajax({
        url: server+'php/update.php',
        type: 'POST',
        data: {
            fields,
            module
        },
		dataType: 'json',
		success: function(datos){
            if (typeof callback === "function") {
                callback(datos);
            }
        },
		error: function(e){
			if (typeof callback === "function") {
                callback(e);
            }
		}
    });   
}

function Check_Session(callback){
    $.ajax({
        url: server+'php/check_session.php',        
		dataType: 'json',
		success: function(datos){
            if (typeof callback === "function") {
                callback(datos);
            }
        },
		error: function(e){
			if (typeof callback === "function") {
                callback(e);
            }
		}
    });   
}

function Kill_Session(callback){
    $.ajax({
        url: server+'php/kill_session.php',        
		dataType: 'json',
		success: function(datos){
            if (typeof callback === "function") {
                callback(datos);
            }
        },
		error: function(e){
			if (typeof callback === "function") {
                callback(e);
            }
		}
    });   
}