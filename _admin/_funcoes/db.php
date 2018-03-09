<?php  
//função para redirecionar o usuario não logado para outra pagina 
include('../_login/restricao.php');
// Função de conexão

$banco = "banco_de_aquivos";
$usuario = "root";
$senha = "";
$hostname = "localhost";

// Tentando conectar

$conexao = @mysql_connect($hostname, $usuario, $senha); mysql_select_db($banco) or die("Nao foi possivel conectar ao Banco"); # @-Tira o aviso de que a função usada está ultrapassada. Usar essa: new mysqli($hostname, $usuario, $senha, $banco);

if ($conexao)
{
	echo "Conexao Realizada com Sucesso!";
} 
else
{
	echo "Nao foi possivel conectar ao Banco";
	exit;
}

mysql_close(); #Fecha a consulta no mysql

?>