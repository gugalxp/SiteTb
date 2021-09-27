<?php
require_once("../vendor/autoload.php");

  //Variáveis
  $melhoremail = isset($_POST['melhoremail']) ? $_POST['melhoremail'] : 'Não informado';
  $data = date('d/m/Y H:i:s');
  
if($melhoremail) {
  
//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = 0;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Use `$mail->Host = gethostbyname('smtp.gmail.com');`
//if your network does not support SMTP over IPv6,
//though this may cause issues with TLS

//Set the SMTP port number:
// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
// - 587 for SMTP+STARTTLS
$mail->Port = 465;

//Set the encryption mechanism to use:
// - SMTPS (implicit TLS on port 465) or
// - STARTTLS (explicit TLS on port 587)
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'curttorock@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'gugalxp500';

$mail->addAddress('curttorock@gmail.com', 'MELHOR E-MAIL SITE TEMPEROS');

//Set the subject line
$mail->Subject = "MELHOR E-MAIL";
$mail->isHTML(true);
$mail->Body = "<html>
<b>Melhor E-mail: </b>{$melhoremail}<br>
<b>{$data}</b>
</html>
";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents(''), __DIR__);


//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Email não enviado: ' . $mail->ErrorInfo;
} else {

 header('Location: ../email-sent.html');
 exit;
  
}

}

  ?>
