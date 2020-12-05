console.log("Camara de Frio");

$("#modal_usuarios").click(e => {
    $("#usuarios").modal('show');
})

$("#modal_reportes").click(e => {
    $("#reportes").modal('show');
})

$(document).ready(e => {
    document.getElementById("fecha_inicio").valueAsDate = new Date();
    document.getElementById("fecha_final").valueAsDate = new Date();
    document.getElementById("fecha_actual").valueAsDate = new Date();
    Buscar();
})

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