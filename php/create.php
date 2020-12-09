<?php

header("Access-Control-Allow-Origin: *");

$respuesta['estado'] = false;

try{
    require 'meta.php';
    require 'email.php';

    $campos = $_POST['fields'];

    switch ($_POST['module']) {        
        case 'usuarios':
            $correo = $campos['correo'];
            $password = $campos['password'];

            $borrar = Meta::Nuevo_Usuario($correo, $password);

            $respuesta['estado'] = true;

            break;
        case 'envio_email':
            $enviar_a = $campos['enviar_a'];

            $fecha_inicio = $campos['fecha_inicio'];
            $fecha_final = $campos['fecha_final'];

            $consulta = Meta::Consulta("SELECT * FROM registros WHERE (fecha_hora BETWEEN '".$fecha_inicio." 00:00:00' AND '".$fecha_final." 23:59:59') ORDER BY fecha_hora DESC");

            if (is_array($consulta)){
                if (count($consulta) > 0){
                    $datos = '';

                    foreach ($consulta as $linea) {
                        $datos .= '<tr>';
                        $datos .= '<td>'.$linea['fecha_hora'].'</td>';
                        $datos .= '<td>'.number_format($linea['temperatura'], 2).' C</td>';
                        $datos .= '</tr>';
                    }

                    Enviar_Correo($enviar_a, $datos);
                }
            }

            $respuesta['estado'] = true;

            break;
    }
    // $respuesta['post'] = $_REQUEST;
}catch(Exception $e){
    $respuesta['error'] = $e;
}

echo json_encode($respuesta);