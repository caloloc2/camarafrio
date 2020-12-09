<?php 

header("Access-Control-Allow-Origin: *");

$respuesta['estado'] = false;

try{
    require 'meta.php';

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $consulta = Meta::Consulta_Unico("SELECT * FROM usuarios WHERE (correo='".$correo."') AND (clave='".$password."')");

    if ($consulta['id_usuario']!=''){
        session_start();
        
        $_SESSION['user'] = $consulta;
        $_SESSION['status'] = true;
        
        $respuesta['session'] = 'Session started';  
        $respuesta['consulta'] = $consulta;    
        $respuesta['estado'] = true;
    }

    

}catch(Exception $e){
    $respuesta['error'] = $e->getMessage();
}

echo json_encode($respuesta);