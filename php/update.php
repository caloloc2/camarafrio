<?php

header("Access-Control-Allow-Origin: *");

$respuesta['estado'] = false;

try{
    require 'meta.php';

    $campos = $_POST['fields'];

    switch ($_POST['module']) {        
        case 'notificacion':
            $correo = $campos['correo'];

            $consulta = Meta::Consulta_Unico("SELECT * FROM notificacion");
            
            if ($consulta['correo']!=""){
                $sql = "UPDATE notificacion SET correo='".$correo."' WHERE id_notificacion=".$consulta['id_notificacion'];
                $actualiza = Meta::Ejecutar($sql);
            }else{
                $nuevo = Meta::Correo_Notificacion($correo);
            }
                
            $respuesta['estado'] = true;
            break;
    }
}catch(Exception $e){
    $respuesta['error'] = $e;
}

echo json_encode($respuesta);