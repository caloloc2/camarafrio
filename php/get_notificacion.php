<?php 

header("Access-Control-Allow-Origin: *");

$respuesta['estado'] = false;

try{
    require 'meta.php';

    $consulta = Meta::Consulta_Unico("SELECT * FROM notificacion ORDER BY id_notificacion DESC LIMIT 1");

    $respuesta['consulta'] = $consulta;    
    $respuesta['estado'] = true;

}catch(Exception $e){
    $respuesta['error'] = $e->getMessage();
}

echo json_encode($respuesta);