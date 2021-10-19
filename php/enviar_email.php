<?php
  //Variáveis
  $nome = isset($_POST['name']) ? $_POST['name'] : 'Não informado';
  $email = isset($_POST['email']) ? $_POST['email'] : 'Não informado';
  $assunto = isset($_POST['subject']) ? $_POST['subject'] : 'Não informado';
  $mensagem = isset($_POST['message']) ? $_POST['message'] : 'Não informado';

  date_default_timezone_set('America/Sao_Paulo'); // CDT
 $current_date = date('d/m/Y - H:i:s'); 

  //Compo E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Mensagem: </b>$mensagem</p>
      <p><b>Assunto: </b>$assunto</p>
      <p>Este e-mail foi enviado em <b>$current_date</b>
    </html>
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "curttorock@gmail.com";
  

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

  //Enviar
  mail($destino, $assunto, $arquivo, $headers);
  
  echo "<meta http-equiv='refresh' content='10;URL=../php/email_enviado.html'>";
?>