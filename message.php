<?php
  $Nome = htmlspecialchars($_POST['Nome']);
  $Email = htmlspecialchars($_POST['Email']);
  $Número = htmlspecialchars($_POST['Número']);
  $Assunto = htmlspecialchars($_POST['Assunto']);
  $message = htmlspecialchars($_POST['message']);
  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "crafael.wesley@gmail.com"; //enter that email address where you want to receive all messages
      $subject = "From: $Nome <$Email>";
      $body = "Nome: $Nome\nEmail: $Email\nNúmero: $Número\nAssunto: $Assunto\n\nMessage:\n$message\n\nRegards,\n$Nome";
      $sender = "From: $Email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Your message has been sent";
      }else{
         echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "Email and message field is required!";
  }
?>