<?php

include 'config.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{


$error = '';

$recebenome = $_POST["name"];
$recebemail = $_POST["email"];
$recebeassunto = $_POST["subject"];
$recebemsg = $_POST["message"];

// Definindo os cabeçalhos do e-mail
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type:text/html; charset=utf-8 \n";
$headers .= "From: Formulario de contato <contato@seudominio.com.br> \n";

// Vamos definir agora o destinatário do email, ou seja, VOCÊ ou SEU CLIENTE
$para = "crafael.wesley@gmail.com";

// Definindo o aspecto da mensagem
$mensagem = "<h3>De:</h3> ";
$mensagem .= $recebenome;
$mensagem .= "<h3>Contato:</h3>";
$mensagem .= $recebefone.' - E-mail: '.$recebemail;
$mensagem .= "<h3>Observações</h3>";
$mensagem .= "<p>";
$mensagem .= $recebemsg;
$mensagem .= "</p>";
// Enviando a mensagem para o destinatário
mail($para,'Contato Pelo Site - De: '.$recebenome,$mensagem,$headers);
// Resposta Automática, preparando o e-mail com a resposta.
$mensagem2 = "<p>Olá <strong>" . $recebenome . "</strong>.<p>Agradecemos sua visita ao nosso site e a oportunidade de receber-mos seu contato.
<br />Em breve responderemos sua questão através de correio eletrônico.</p><br><p>OBS.: Não é necessário responder esta mensagem!</p><br>";
$mensagem2 .= "<p>Atenciosamente<br />Equipe ".$empresa."</p>";

// Enviando a resposta sutomática

$envia = mail($recebemail,"Agradecemos sua visita ao nosso site",$mensagem2,$headers);
if(!$error)
{
$mail = mail(WEBMASTER_EMAIL, $subject, $message,
"From: ".$name." <".$email.">\r\n"
."Reply-To: ".$email."\r\n"
."X-Mailer: PHP/" . phpversion());


if($mail)
{
echo 'OK';
}

}


}
?>
