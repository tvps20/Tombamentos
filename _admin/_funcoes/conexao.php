<?php 

error_reporting(E_ALL & ~ E_DEPRECATED); // Some com as mensagens de desuso das funções.

// Função de Conexão

function conexao ($banco = "bancodearquivos", $hostname = "localhost", $usuario = "root", $senha = "")
{
	// tenta estabelecer a conexão com o servidor
	$conect = @mysql_connect($hostname, $usuario, $senha);

	// conseguiu conectar?
	if ($conect)
	{
		// tenta selecionar o banco de dados
		$db = mysql_select_db($banco, $conect);

		// conseguiu selecionar o banco?
		if ($db)
		{
			return $conect;
		}
		else 
		{
			die(trigger_error("Não foi Possível Selecionar o Banco de Dados!"));
			return false;
		}
	}
	else 
	{
		die(trigger_error("Não foi Possível Estabelecer a Conexão!"));
		return false;
	}
}
?>