<?php
include "../Config/config_sistema.php";


$codigo = $_GET['codigo'];


$consulta = mysql_query("delete from dados_usuarios where ID = '".$codigo."'");


if($consulta) {
	$msg = urlencode("Usuário excluido com sucesso!");
	header("Location: listar_usuarios.php?msg=$msg");
	exit;
} else {
	$erro = urlencode("Não foi possivel excluir o contato!");
	header("Location: listar_usuarios.php?erro=$erro");
	exit;
}
?>