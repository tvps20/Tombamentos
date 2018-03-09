<?php 
//função para redirecionar o usuario não logado para outra pagina 
include('../_login/restricao.php');
include("../_funcoes/atualizar.php");

$nome = $_REQUEST['nNome'];
$usuario = $_REQUEST['nUsuario'];
$senha = $_REQUEST['nSenha'];
$novaSenha = $_REQUEST['nNovaSenha'];
$status = $_REQUEST['nStatus'];
$id = $_REQUEST['id'];

@$cripSenha = crypt($novaSenha); #criptografando a senha do usuário.


atualizar(array("nome", "usuario", "senha", "status"), array($nome, $usuario, $cripSenha, $status), "cadastro_usuario", "WHERE id = '$id'");

header("location:../../consultaUsuarios.php?msg=atualizado");

?>