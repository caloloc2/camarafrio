<?php 

header("Access-Control-Allow-Origin: *");

$respuesta['estado'] = false;
$respuesta['session'] = false;

try{
    session_start();

    if ((isset($_SESSION['status'])) && ($_SESSION['status'])){
       $respuesta['session'] = true;
       $respuesta['user'] = $_SESSION['user'];
    }
}catch(Exception $e){
    $respuesta['error'] = $e->getMessage();
}

echo json_encode($respuesta);