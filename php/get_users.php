<?php 

header("Access-Control-Allow-Origin: *");

$respuesta['estado'] = false;

try{
    require 'meta.php';

    $consulta = Meta::Consulta("SELECT * FROM usuarios ORDER BY id_usuario DESC");

    $respuesta['consulta'] = $consulta;    
    $respuesta['estado'] = true;

}catch(Exception $e){
    $respuesta['error'] = $e->getMessage();
}

echo json_encode($respuesta);