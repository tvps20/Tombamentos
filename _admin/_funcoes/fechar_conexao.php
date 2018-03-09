<?php 

// Função para fechar a conexão

function fechaconexao ($conect) 
{
	$fecha = mysql_close($conect);

	if ($fecha)
	{
		return true;
	} 
	else 
	{
		echo "Impossível Fechar a Conexão";
		return false;
	}
}
?>