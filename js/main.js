console.log("Camara de Frio");

$("#modal_usuarios").click(e => {
    Buscar_Usuarios();
})

function Buscar_Usuarios(){
    Consulta_Usuarios(datos => {
        // console.log(datos);
        if (datos.estado){
            var items = ''
            datos.consulta.forEach(element => {                
                items += '<tr>';                
                items += '<td>'+element.correo+'</td>';
                items += '<td>'+element.clave+'</td>';
                items += '<td><a href="#" onclick="Eliminar_Usuario('+element.id_usuario+'); return false;" class="btn btn-sm btn-info">Eliminar</a></td>';
                items += '</tr>';
            });
            $("#lista_usuarios").html(items);
            $("#usuarios").modal('show');
        }
    })  
}

function Eliminar_Usuario(id){
    var campos = {
        id_usuario: id
    }
    Delete(campos, 'usuarios', datos => {
        // console.log(datos);
        if (datos.estado){
            Buscar_Usuarios();
            alert("Usuario Eliminado")
        }
    })
}

$("#add_user").submit(e => {
    e.preventDefault();
    var campos = {
        correo: document.getElementById('correo_create').value,
        password: document.getElementById('password_create').value,
    }

    Create(campos, 'usuarios', datos => {
        console.log(datos);
        if (datos.estado){
            document.getElementById('correo_create').value = ""
            document.getElementById('password_create').value = ""
            Buscar_Usuarios();
        }
    })
})

$("#correo_notificacion").submit(e => {
    e.preventDefault();
    var campos = {
        correo: document.getElementById("correo_para_notificacion").value 
    }

    if (campos.correo!=''){
        Update(campos, 'notificacion', datos => {
            console.log(datos);
            if (datos.estado){
                alert("Correo electrónico actualizado.")
                Correo_Notificacion();
            }
        })
    }
})

$("#modal_reportes").click(e => {
    $("#reportes").modal('show');
})

$(document).ready(e => {
    document.getElementById("fecha_inicio").valueAsDate = new Date();
    document.getElementById("fecha_final").valueAsDate = new Date();
    document.getElementById("fecha_actual").valueAsDate = new Date();
    Buscar();
    Correo_Notificacion();

    Check_Session(datos => {
        // console.log(datos);
        if (datos.session){
            $("#correo_usuario").html(datos.user.correo)
            $("#login").fadeOut();

            setInterval(() => {
                Umbral(datos => {
                    console.log(datos);
                })
            // }, 1000 * 60 * 5);
            }, 1000 * 10);
        }
    })    
})

function Correo_Notificacion(){
    Consulta_Notificacion(datos => {
        console.log(datos);
        if (datos.estado){
            document.getElementById("correo_para_notificacion").value = datos.consulta.correo;
        }        
    })
}

function Buscar(){
    var campos = {
        fecha_inicio : document.getElementById('fecha_actual').value,
        fecha_final : document.getElementById('fecha_actual').value,
    }
    setInterval(() => {
        Consulta_Temperaturas(campos, datos => {
            // console.log(datos);
            if (datos.estado){
                var items = '';
                var inicio = 0;
                datos.consulta.forEach(element => {
                    if (inicio == 0){
                        $("#valor_temperatura").html(parseFloat(element.temperatura).toFixed(2));
                        inicio = 1 ;
                    }
                    items += '<tr>';
                    items += '<td>'+element.fecha_hora+'</td>';
                    items += '<td class="text-center">'+parseFloat(element.temperatura).toFixed(2)+' &deg; C</td>';
                    items += '</tr>';
                });
                $("#listado_temperaturas").html(items);
            }
        })    
    }, 1000);    
}

$("#form_login").submit(e => {
    e.preventDefault();

    var campos = {
        correo: document.getElementById('correo_login').value,
        password: document.getElementById('password_login').value
    }

    Login(campos, datos => {
        // console.log(datos);

        if (datos.estado){
            $("#correo_usuario").html(datos.consulta.correo)
            $("#login").fadeOut();
        }
    })
})

$("#logout").click(e => {
    Kill_Session(datos => {
        // console.log(datos);
        if (datos.estado){
            document.getElementById('correo_login').value = ""
            document.getElementById('password_login').value = ""
            $("#correo_usuario").html("")
            $("#login").fadeIn();
        }
    })
})

$("#envio_correo").click(e => {
    const enviar_a = document.getElementById('correo_reporte').value
    if (enviar_a != ""){
        var campos = {
            enviar_a,
            fecha_inicio: document.getElementById("fecha_inicio").value,
            fecha_final: document.getElementById("fecha_final").value,
        }        
        $("#reportes").modal('hide');
        Create(campos, 'envio_email', datos => {
            // console.log(datos);
            alert("Correo enviado")            
        })
    }else{
        alert("Debe especificar un correo");
    }
})

$("#crear_pdf").click(e => {
    var campos = {        
        fecha_inicio: document.getElementById("fecha_inicio").value,
        fecha_final: document.getElementById("fecha_final").value,
    }
    window.location.href = "php/pdf.php?fecha_inicio="+campos.fecha_inicio+"&fecha_final="+campos.fecha_final    
})