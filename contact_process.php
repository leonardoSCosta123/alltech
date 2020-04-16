<?php

$to = "leonardoocosta123@gmail.com";
$from = $_POST['email'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$number = $_POST['number'];
$cmessage = $_POST['message'];

require 'PHPMailer/PHPMailerAutoload.php';

$Mailer = new PHPMailer();

//Define que serÃ¡ usado SMTP
$Mailer->IsSMTP();

//Enviar e-mail em HTML
$Mailer->isHTML(true);

//Aceitar carasteres especiais
$Mailer->Charset = 'UTF-8';

//ConfiguraÃ§Ãµes
$Mailer->SMTPAuth = true;
$Mailer->SMTPSecure = 'ssl';
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
//nome do servidor
$Mailer->Host = 'smtp.gmail.com';
//Porta de saida de e-mail
$Mailer->Port = 587;

//Dados do e-mail de saida - autenticaÃ§Ã£o
$Mailer->Username = 'contatositeconsultoria@gmail.com';
$Mailer->Password = 'contatosite123';

//E-mail remetente (deve ser o mesmo de quem fez a autenticaÃ§Ã£o)
$Mailer->From = 'contatositeconsultoria@gmail.com';

//Nome do Remetente
$Mailer->FromName = $subject;

//Assunto da mensagem
$Mailer->Subject = $subject;

//Corpo da Mensagem
$Mailer->Body = 'Dados do contato :'.$cmessage.'\n Nome :'.$name.'\n e-mail : '.$from.'\n Telefone : '.$number;

//Corpo da mensagem em texto
$Mailer->AltBody = 'Dados do contato :'.$cmessage.'\n Nome :'.$name.'\n e-mail : '.$from.'\n Telefone : '.$number;

//Destinatario
$Mailer->AddAddress($to);

if ($Mailer->Send()) {
	echo "E-mail enviado com sucesso";
//         $_SESSION["sucesso1"] = "<div class=\"container\">
//                                   <div class=\"alert alert-success\">
//                                     <strong>Sucesso!</strong>Sua senha foi enviada para seu email !!.
//                                   </div>
//                               </div>";
} else {
	// echo "Ops!! O servidor parou.".'Dados do contato :'.$cmessage.'\n Nome :'.$name.'\n e-mail : '.$from.'\n Telefone : '.$number;
}


?>