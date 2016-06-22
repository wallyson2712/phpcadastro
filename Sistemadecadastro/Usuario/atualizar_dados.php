<?php
include "../validar_session.php";

include "../Config/config_sistema.php";

$email = htmlspecialchars($_POST['email']);
$pais = $_POST['pais'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];


if($email == "") {
	echo "Digite seu email!";
	exit;
}


if($pais == "") {
	echo "Digite o país de onde você mora!";
	exit;
}


if($estado == "") {
	echo "Digite o estado de onde você mora!";
	exit;
}


if($cidade == "") {
	echo "Digite a cidade de onde você mora!";
	exit;
}


if($cep == "") {
	echo "Digite o CEP de onde você mora!";
	exit;
}


$sql = "update dados_usuarios set Email = '$email',Pais = '$pais',Estado = '$estado',Cidade = '$cidade',Cep = '$cep' where Login = '$login_usuario'";
$consulta = mysql_query($sql);


if($consulta) {
	$msg = urlencode("Dados atualizados com sucesso!");
	header("Location: dados_usuario.php?msg=$msg");
	exit;
} else {
	echo "<font color=red><b>
		  Não foi possivel atualizar os dados!<br>
		  Click <a href=dados_usuarios.php>aqui</a> para retornar!
		  </font></b>";
	exit;
}
?>