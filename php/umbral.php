<?php

header("Access-Control-Allow-Origin: *");

$respuesta['estado'] = false;

try{
    require 'meta.php';
    require 'email.php';

    $consulta = Meta::Consulta_Unico("SELECT * FROM registros WHERE estado=0 ORDER BY id_registro DESC LIMIT 1");

    if ($consulta['id_registro']!=''){
        $temperatura = floatval($consulta['temperatura']);

        if ($temperatura>12){
            $correo = Meta::Consulta_Unico("SELECT correo FROM notificacion ORDER BY id_notificacion DESC LIMIT 1");

            if ($correo['correo']!=''){
                $datos = '<tr>';
                $datos .= '<td>'.$consulta['fecha_hora'].'</td>';
                $datos .= '<td>'.number_format($consulta['temperatura'], 2).' C</td>';
                $datos .= '</tr>';

                Enviar_Correo($correo['correo'], $datos);    
                $respuesta['umbral'] = "superado";
            }
            
        }

        $actualiza = Meta::Ejecutar("UPDATE registros SET estado=1 WHERE id_registro=".$consulta['id_registro']);
    }

    $respuesta['estado'] = true;

}catch(Exception $e){
    $respuesta['error'] = $e;
}

echo json_encode($respuesta);