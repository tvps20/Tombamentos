<?php  
//função para redirecionar o usuario não logado para outra pagina 
include('../_login/restricao.php');
// Função para atualizar dados no banco de dados

include("conexao.php");
include("fechar_conexao.php");

function atualizar ($coluna, $valor, $tabela, $onde)
{
	// os dados estão em arrays?
	if ((is_array($coluna) and (is_array($valor))))
	{
		// são do mesmo tamanho?
		if (count($coluna) == count($valor))
		{
			$valor_coluna = NULL;

			// Colocar arrays em uma string
			for($i = 0; $i < count($coluna); $i++)
			{
				$valor_coluna .= "{$coluna[$i]} = '{$valor[$i]}',";
			}

			// Tirando a virgula da ultima posição
			$valor_coluna = substr($valor_coluna, 0, -1);

			// Montando a sql
			$atualizar = "UPDATE {$tabela} SET {$valor_coluna} {$onde}";
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
		$atualizar = "UPDATE {$tabela} SET {$coluna} = '{$valor} {$onde}";
	}

	// Conseguiu se conectar ao sevidor?
	if ($conexao = conexao())
	{
		// Conseguiu iserir?
		if (mysql_query($atualizar, $conexao))
		{
			// Fecha a conexão
			fechaconexao($conexao);
			return true;
		}
		else 
		{
			echo "Query Inválida!";
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