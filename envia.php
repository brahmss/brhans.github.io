<?php

/*Verifica o SO para gerar  o código de retorno correto */

   if(PHP_OS == "Linux")$quebra_linha = "\n";
   elseif(PHP_OS == "WINNT")$quebra_linha = "\r\n";
   elseif("Este script não roda no seu servidor!");
  
   /* Criando as váriaveis e resgatando os POSTs */

  $origem = "contato@shefarol.com.br";  /*Deve existir no provedor*/
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $fone = $_POST['fone'];
  $comentario = $_POST['comentario'];
  $destinatario = "bruno.sdantas3@gmail.com";
  $assunto = "Contato web";

	  
/* Formatamos a mensagem */

  $msg ="<strong>Nome: </strong>" . $nome . "<br />";
  $msg .="<strong>E-mail: </strong>" . $email . "<br />";
  $msg .="<strong>Fone: </strong>" . $fone . "<br />";
  $msg .="<strong>Comentario: </strong>" . $comentario . "<br />";
	
	/*Criando o cabeçalho do e-mail */
	
	$header = "MIME-Version: 1.1" .$quebra_linha;
	$header .="Content-type: text/html; charset=utf8" .$quebra_linha;
	$header .="From:" .$origem . $quebra_linha;
    $header .="Return-Path: " .$origem . $quebra_linha;


  /* Enviando o E-mail*/


if(!mail($destinatario, $assunto, $msg, $header, "-r" .$origem)){ // se for Postfix
 mail($destinatario, $assunto, $msg, $header);
}

       /*Redirecionar para a página obrigado.html */
	   
	   
	   echo("<meta http-equiv = 'refresh='1;URL=obrigado.html'>");


?>  


