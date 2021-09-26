<?php
require_once("../vendor/autoload.php");

  //Variáveis
  $nome = isset($_POST['nome']) ? $_POST['nome'] : 'Não informado';
  $email = isset($_POST['email']) ? $_POST['email'] : 'Não informado';
  $assunto = isset($_POST['assunto']) ? $_POST['assunto'] : 'Não informado';
  $mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : 'Não informado';
  $data = date('d/m/Y H:i:s');
  
if($email && $mensagem) {
  
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
$mail->Username = 'aaaaaaaaaaa';

//Password to use for SMTP authentication
$mail->Password = 'aaaaaaaaa';

//Set who the message is to be sent from
//Note that with gmail you can only use your account address (same as `Username`)
//or predefined aliases that you have configured within your account.
//Do not use user-submitted addresses in here
$mail->setFrom($email, $nome);

//Set an alternative reply-to address
//This is a good place to put user-submitted addresses
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('aaaaaaaaaaaaa', 'ASSUNTO SITE TEMPEROS');

//Set the subject line
$mail->Subject = $assunto;
$mail->isHTML(true);
$mail->Body = "<html>
<b>Nome: </b>{$nome}<br> 
<b>E-mail: </b>{$email}<br>
<b>Assunto: </b>{$assunto}<br>
<b>Mensagem: </b>{$mensagem}<br><br> 
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

}else{

echo "informe o email ou a mensagem.";
}

  ?>
