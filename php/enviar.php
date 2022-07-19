<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nombre =  $_POST['nombre'];
$email =  $_POST['email'];
$asunto =  $_POST['asunto'];
$mensaje =  $_POST['mensaje'];

$body = "Nombre: " . $nombre .
"<br>Correo: " . $email.
"<br>Asunto: " . $asunto .
"<br>Mensaje: " . $mensaje;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.titan.email';
    $mail->Port = 587;
    $mail->SMTPAuth = true;                                 //Enable SMTP authentication
    $mail->Username   = 'consultas@xn--canastasnavideasguatemala-moc.com';                     //ACCESO AL CORREO
    $mail->Password   = 'IWO6Utucbh';                               //ACCESO AL CORREO
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('consultas@xn--canastasnavideasguatemala-moc.com', $nombre); //DESDE DONDE SE ENVIA EL CORREO
    $mail->addAddress('ly8822@hotmail.com');
    $mail->addAddress('dinouliserr5@gmail.com');   // QUIEN RECIBE EL CORREO

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';

    $mail->send();
    echo '<script>
            alert("Mensaje enviado correctamente");
            window.history.go(-2);
        </script>';
} catch (Exception $e) {

    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";

}