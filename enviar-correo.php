<?php
//    Datos cliente
$nombre = $_POST['nombrecliente'];
$apellido1 = $_POST['apellidopaterno'];
$apellido2 = $_POST['apellidomaterno'];
$direccion = $_POST['direccioncliente'];
$tipodoc = $_POST['tipodocumento'];
$nrodoc = $_POST['documentoidentidad'];
$telefono = $_POST['telefonocliente'];
$correo = $_POST['emailcliente'];
$edadcliente = $_POST['edadcliente'];

//    Datos Compra

$tipoCompra = $_POST['tipo-compra'];
$tipomoneda = $_POST['tipomoneda'];
$importecompra = $_POST['importecompra'];
$descripcioncompra = $_POST['descripcionreclamo'];
$reclamoqueja = $_POST['reclamo-queja'];
$detallereclamo = $_POST['detallereclamo'];
$detallepedido = $_POST['detallepedido'];

$message = "<h3 style='text-align:center;'>Reclamo de $nombre $apellido1 $apellido2</h3>
<h3>Cliente</h3>
<p style='font-weight: 500;'><strong>De: </strong>Sr(a) $nombre $apellido1 $apellido2 <br> 
<strong>Con Dirrecion:</strong> $direccion <br>
<strong>Con $tipodoc:</strong> $nrodoc <br>
<strong>Con dirección de correo electrónico:</strong> $correo <br>
<strong>Telefono:</strong> $telefono <br>
<strong>Edad: </strong>$edadcliente años</p> <br> 
<h3>Reclamo</h3>
<p style='font-weight: 500;'><strong> Acontinuacion se da a conocer el Relamo o Queja realizado y sus detalles: </strong><br> 
Se efectuo el contrato del $tipoCompra en la moneda de $tipomoneda de un importe total de $importecompra $tipomoneda <br> 
<strong>Detallando todos los datos a continuacion: </strong><br> $descripcioncompra <br>
<strong>El/La $reclamoqueja se efectuo por lo siguiente: </strong><br>
 $detallereclamo <br>
 $detallepedido </p>";

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
    $mail->addReplyTo($correo);    //Cuenta a la q se va a responder
    // PARA AGREGAR MAS A LOS QUE SE LES ENVIA EL CORRERO
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments PARA ARCHIVOS Y VIDEOS
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Libro de reclamaciones de Suyoq.com";
    $mail->Body    = $message;
    $mail->AltBody = 'Correo de reclamo de prueba con PHPMAILER';
    // PARA RECONOCER TILDES Y OTROS SIMBOLOS
    $mail->CharSet = 'UTF-8';


    $mail->send();
    echo '<Script> alert("EL RECLAMO SE ENVIO SATISFACTORIAMENTE");    
    </Script>';
    echo '<Script>location.href = "javascript:window.history.back();"</Script>';
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
    echo '<Script> alert("NO SE PUDO ENVIAR EL MENSAJE, VERIFIQUE QUE LOS CAMPOS"); 
    location.href = "javascript:window.history.back();"</Script>';
}