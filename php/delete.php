<?php

header("Access-Control-Allow-Origin: *");

$respuesta['estado'] = false;

try{
    require 'meta.php';

    $campos = $_POST['fields'];

    switch ($_POST['module']) {        
        case 'usuarios':
            $id_usuario = $campos['id_usuario'];

            $borrar = Meta::Ejecutar("DELETE FROM usuarios WHERE id_usuario=".$id_usuario);

            $respuesta['estado'] = true;

            break;              
    }
    // $respuesta['post'] = $_REQUEST;
}catch(Exception $e){
    $respuesta['error'] = $e;
}

echo json_encode($respuesta);