<?php
$asunto = $_POST['asuntos'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

$carta = "<h3 style='text-align:center;'>Contacto desde Suyoq.com</h3>";
$carta .= "<strong>De:</strong> $nombre <br>";
$carta .= "<strong>Correo:</strong> $correo <br>";
$carta .= "<strong>Telefono:</strong> $telefono <br>";
$carta .= "<strong>Mensaje:</strong> <br>
<h3 style='text-align:center;'>$asunto</h3> <br>
$mensaje";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.supremecluster.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'operaciones@textilviso.com';                     //SMTP username
    $mail->Password   = 'tv24021976';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($correo ,'Suyoq.com');
    $mail->addAddress('operaciones@textilviso.com',);     //Add a recipient
    $mail->addReplyTo($correo);    //Cuenta a la q se va a responder
    // PARA AGREGAR MAS A LOS QUE SE LES ENVIA EL CORRERO
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments PARA ARCHIVOS Y VIDEOS
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contacto desde Suyoq.com';
    $mail->Body    = $carta;
    $mail->AltBody = 'Correo de prueba Ventas Corporativas';
    // PARA RECONOCER TILDES Y OTROS SIMBOLOS
    $mail->CharSet = 'UTF-8';

    $mail->send();
    echo '<Script> alert("EL MENSAJE SE ENVIO CORRECTAMENTE. \n GRACIAS POR CONTACTARNOS");    
    </Script>';
    echo '<Script>location.href = "javascript:window.history.back();"</Script>';
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
    echo '<Script> alert("NO SE PUDO ENVIAR EL MENSAJE, VERIFIQUE QUE LOS CAMPOS"); 
    location.href = "javascript:window.history.back();"</Script>';
}