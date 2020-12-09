<?php 

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

try {

    function Enviar_Correo($correo, $datos){
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'bodegafcia@gmail.com';                     // SMTP username
        $mail->Password   = '2020.bodega';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('bodegafcia@gmail.com', 'Camara de Frio');
        $mail->addAddress($correo, 'Notificacion');     // Add a recipient     

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Reporte Camara de Frio';        
        $contenido = file_get_contents('plantilla/correo.html');
        $contenido = str_replace('%datos%', $datos, $contenido); 
        $mail->MsgHTML($contenido);       

        $mail->send();
        return true;
    }    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}