<?php
@session_start();


include "Config/config_sistema.php";


if(isset($_SESSION['login_usuario']) and isset($_SESSION['senha_usuario'])) {
	// se existie as sessões coloca os valores em uma varivel
	$login_usuario = $_SESSION['login_usuario'];
	$senha_usuario = $_SESSION['senha_usuario'];
} else {
	$erro = urlencode("Você não esta logado!");
	header("Location: ../index.php");
	exit;
}


if(!(empty($login_usuario) or empty($senha_usuario))) {
	
	$consulta = mysql_query("select * from dados_usuarios where Login = '$login_usuario'");
	if(mysql_num_rows($consulta) == 1) {
		
		if($senha_usuario != mysql_result($consulta,0,"Senha")) {
		
			unset($_SESSION['login_usuario']);
			unset($_SESSION['senha_usuario']);
			
			$erro = urlencode("Você não esta logado!");
			header("Location: ../index.php");
			exit;
		}
	} else {
		unset($_SESSION['login_usuario']);
		unset($_SESSION['senha_usuario']);
		
		$erro = urlencode("Você não esta logado!");
		header("Location: ../index.php");
		exit;
	}
} else {
	
	$erro = urlencode("Você não esta logado!");
	header("Location: ../index.php");
	exit;
}
mysql_close($conn);
?>