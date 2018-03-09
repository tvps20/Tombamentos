<?php
//função para redirecionar o usuario não logado para outra pagina 
include('../_login/restricao.php'); 
include("../_funcoes/inserir.php");

$nome = $_REQUEST['nNome'];
$usuario = $_REQUEST['nUsuario'];
$senha = $_REQUEST['nSenha'];
$data = $_REQUEST['nData'];
$status = $_REQUEST['nStatus'];


@$cripSenha = crypt($senha); #criptografando a senha do usuário.

inserir(array("nome", "usuario", "senha", "status"), array($nome, $usuario, $cripSenha, $status), "cadastro_usuario");

header("location:../../cadastro.php?msg=enviado");
?>