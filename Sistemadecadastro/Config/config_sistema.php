<?php

// faz conexуo com o servidor MySQL
$local_serve = "us-cdbr-azure-west-c.cloudapp.net"; 	 // local do servidor
$usuario_serve = "be41ac7ec4a8a2";		 // nome do usuario
$senha_serve = "8be684e8";			 	 // senha
$banco_de_dados = "acsm_57fc61c0211f0ca"; 	 // nome do banco de dados

$conn = @mysql_connect($local_serve,$usuario_serve,$senha_serve) or die ("O servidor nуo responde!");

// conecta-se ao banco de dados
$db = @mysql_select_db($banco_de_dados,$conn) 
	or die ("Nуo foi possivel conectar-se ao banco de dados!");
	
// dados do administrador sуo de estrema importancia que sem eles
// o adminstrador nуo tera acesso as paginas de administraчуo
$login_admin = "admin";  			// nome do administrador
$senha_admin = "admin";						// senha administrador
$email_admin = "admin@admin.com";  // email do administrador

?>