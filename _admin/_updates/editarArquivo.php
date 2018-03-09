<?php 
//função para redirecionar o usuario não logado para outra pagina 
include('../_login/restricao.php'); 
include("../_funcoes/atualizar.php");
include("../_funcoes/select2.php"); # Chamando esse select2 para não haver conflito com a função atualizar que tb chama a função conexao dentro dela.


// Recuperando os dados

$id = $_REQUEST['id'];

// Codigo para atualizar a imagem
	# Verificando se o campo da imagem foi selecionado
if($_FILES['nDocumento']['name'] == false){

	//Caso negativo, atualizar os dados sem atualizar o campo
	header("location:../../consultaDocumentos.php?msg=ndAtualizado"); # Direciona para outra pagina. Está enviado uma variável(get) pela url.
}
else {
	// Se o campo img retornar valor, ele faz o upload da imagem.

	// Criar uma matriz com as definições da pasta, tamanho, extensões que a imagem deve conter.
	// Também habilita e desabilita a renomiação do arquivo da imagem.
	$_UP['pasta'] = '../../_documentos/'; # Pasta para onde vai os arquivos upados.
	$_UP['tamanho'] = 1024 * 1024 * 2; # Tamanho de 2Mb
	$_UP['extensoes'] = array('pdf'); # Extensões permitidas.
	$_UP['renomeia'] = true; # Para evitar nomes repitidos

	// Verificar se as extenções do arquivo é valida.
	$extensao = strtolower(end(explode('.', $_FILES['nDocumento']['name']))); # Pegando a extensão do arquivo.
	if(array_search($extensao, $_UP['extensoes']) === false) {  # Pesquisa dentro do array
		header("location:../editarDocumento.php?msg=erro-extensao");
		exit; # Para sair da execusão
	}
	else if($_UP['tamanho'] < $_FILES['nDocumento']['size']){
		header("location:../editarDocumento.php?msg=erro-tamanho");
		exit;
	}

	// Renomer antes de ser enviado pro sevidor.

	else {
		if($_UP['renomeia'] == true){
			$nome_final = time().'.'.$extensao; # time(): pega o time atual e concatena na extensão para formar um novo nome.
		}
		else {
			$nome_final = $_FILES['nDocumento']['name'];
		}

		if(move_uploaded_file($_FILES['nDocumento']['tmp_name'], $_UP['pasta'] . $nome_final)){ // Fazendo o upload da imagem e criando um nome temporário

		}
		else {
			header("location:../editarDocumento.php?msg=erro-upload");
			exit;
		}
	}

	// Depois do upload ele faz uma consulta para selecionar o campo 'imagem' para excluir a imagem antiga
	$consulta = consulta("cadastro_documento", "nome", "WHERE id = '$id'");
	// Verifica se consegue encontrar o campo
	if($consulta == true){
		// Caso seja positivo, monta uma matriz e resgata o resultado
		for($i=0; $i<count($consulta); $i++){
			$excluir_documento = $consulta[$i]['nome'];
		}

		// Excluir a imagem Antiga do diretório
		unlink("../../_documentos/$excluir_documento");
	}

	// Faz a atualização dos campos e da incluse do nome da imagem no banco de dados

	atualizar(array("nome"), array($nome_final), "cadastro_documento", "WHERE id = '$id'"); # Inserindo os arquivos no banco de dados.

	header("location:../../consultaDocumentos.php?msg=atualizado"); # Direciona para outra pagina. Está enviado uma variável(get) pela url.

}

?>