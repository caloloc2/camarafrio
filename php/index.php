<?php 

$respuesta['estado'] = false;

try{
    if (isset($_GET['temperatura'])){
        require 'meta.php';
        $temperatura = $_GET['temperatura'];
        $fecha_hora = date("Y-m-d H:i:s");

        $ingreso = Meta::Nuevo_Registro($fecha_hora, $temperatura);

        $respuesta['estado'] = true;
    }
}catch(Exception $e){
    $respuesta['error'] = $e->getMessage();
}

echo json_encode($respuesta);
