<?php

include "Config/config_sistema.php";

$login = htmlspecialchars($_POST['login']);
$senha = $_POST['senha'];


$consulta = mysql_query("select * from dados_usuarios where Login='$login'");
$campos = mysql_num_rows($consulta);
if($campos != 0) {

	if($senha != mysql_result($consulta,0,"Senha")) {
		echo "<font color=red><b>
			  Senha incorreta!
			  </font></b>";
		exit;
	} else {
		
		if($login == $login_admin) {
			
			if($senha == $senha_admin) {
				
				session_start();
				$_SESSION['login_usuario'] = $login;
				$_SESSION['senha_usuario'] = $senha;
			
				
				header("Location: Admin/listar_usuarios.php");
				
			}
		} else {
			
			session_start();
			$_SESSION['login_usuario'] = $login;
			$_SESSION['senha_usuario'] = $senha;
			
			
			header("Location: Usuario/dados_usuario.php");
		}
	}
} else {
	echo "<font color=red><b>
		  O usuario não existe!
		  </font></b>";
	exit;
}
?>