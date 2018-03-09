<?php  
//função para redirecionar o usuario não logado para outra pagina 
include('../_login/restricao.php');
// Função para inserir dados no banco de dados

include("conexao.php");
include("fechar_conexao.php");

function inserir($coluna, $valor, $tabela)
{
	// os dados estão em arrays?
	if ((is_array($coluna) and (is_array($valor))))
	{
		// são do mesmo tamanho?
		if (count($coluna) == count($valor))
		{
			// montar a sql (transforma a matriz em valores para jogar dentro da string. EX: insert into $tabela (nome, email, senha) value ('thiago', 't_vps@teste.com', '123'))
			$inserir = "INSERT INTO {$tabela} (".implode(', ', $coluna).") 
			VALUES ('".implode('\', \'', $valor)."')"; # implode: Vai juntar os elementos da matriz em uma string
        }
		else 
		{
			echo "Arrays não Possuem o Mesmo Tamanho";
			return false;
		}
	}
	else 
	{		
		// montar a sql
		$inserir = "INSERT INTO {$tabela} ({$coluna}) VALUES ('{$valor}')";
	}

	// Conseguiu se conectar ao sevidor?
	if ($conexao = conexao())
	{
		// Conseguiu iserir?
		if (mysql_query($inserir, $conexao))
		{
			// Fecha a conexão
			fechaconexao($conexao);
			return true;
		}
		else 
		{
			return false;
		}
	}
	else 
	{
		echo "Não Conseguiu se Conctar ao Sevidor";
		return false;
	}
}
?>