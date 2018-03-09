<?php 

// Função para consultas no banco de dados

	// Retirando as funções para não ocorrero erro de chamar os includes duas vezes ao usar mais de um include na msm pagina.
		#include("conexao.php");
		#include("fecha_conexao.php"); 

function consulta ($tabela, $coluna = "*", $onde = NULL, $ordem = NULL, $limite = NULL){

	// sql da consulta
	$sql = "SELECT {$coluna} FROM {$tabela} {$onde} {$ordem} {$limite}";

	// Conseguiu se conectar?
	if($conect = conexao()){

		// Conseguiu consultar?
		if($query = mysql_query($sql, $conect)){

			// Encontrou algo?
			if(mysql_num_rows($query) > 0){

				$resultados_totais = array();

				while ($resultado = mysql_fetch_assoc($query)) {
					$resultados_totais[] = $resultado;
				}

				// Fecha conexão
				fechaconexao($conect);

				return $resultados_totais;
			}
			else {
				// Não achou nada
				return false;
			}
		}
		else {
			// Não conseguiu consultar
			return false;
		}
	}
	else {
		// Não conseguiu se conectar
		return false;

	}
}


?>