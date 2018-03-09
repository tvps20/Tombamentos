<?php  
//função para redirecionar o usuario não logado para outra pagina 
include('../_login/restricao.php');
// Função para deletar dados no banco de dados

include("conexao.php");
include("fechar_conexao.php");

function deletar ($tabela, $onde = NULL) {

	// montando a sql
	$delete = "DELETE FROM {$tabela} {$onde}";

	// Conectou?
	if($con = conexao()){
		// Deletou
		if(mysql_query($delete, $con)){
			// Fecha a conexão
			fechaconexao($con);
			return true;
		}
		else {
			echo "Query Invalida {$delete}";
			return false;
		}
	}
	else {
		return false;
	}
}


?>