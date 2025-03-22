<?php

$correo = $_POST['txtcorreo'];

$body = "<h3>NUEVO CLIENTE SUSCRITO A HEISSOCKS.COM</h3><br>
<strong>CORREO:</strong> $correo";

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
    $mail->setFrom($correo, 'Suyoq.com' );
    $mail->addAddress('operaciones@textilviso.com',);     //Add a recipient
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
    $mail->Subject = 'Nueva suscripción a Suyoq.com';
    $mail->Body    = $body;
    $mail->AltBody = 'Correo de prueba con PHPMAILER';
    // PARA RECONOCER TILDES Y OTROS SIMBOLOS
    $mail->CharSet = 'UTF-8';

    $mail->send();
    echo '<Script> alert("GRACIAS POR SUSCRIBIERTE EN HEISSOCKS.COM");    
    </Script>';
    echo '<Script>location.href = "javascript:window.history.back();"</Script>';
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
    echo '<Script> alert("NO SE PUDO EJECUTAR LA SUSCRIPCIÓN, VUELVA A INTENTARLO"); 
    location.href = "javascript:window.history.back();"</Script>';
}