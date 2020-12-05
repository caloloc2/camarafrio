<?php 

header("Access-Control-Allow-Origin: *");

$respuesta['estado'] = false;

try{
    require 'meta.php';

    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];

    $consulta = Meta::Consulta("SELECT * FROM registros WHERE (fecha_hora BETWEEN '".$fecha_inicio." 00:00:00' AND '".$fecha_final." 23:59:59') ORDER BY fecha_hora DESC LIMIT 20");

    $respuesta['consulta'] = $consulta;
    $respuesta['post'] = $_POST;
    $respuesta['estado'] = true;

}catch(Exception $e){
    $respuesta['error'] = $e->getMessage();
}

echo json_encode($respuesta);