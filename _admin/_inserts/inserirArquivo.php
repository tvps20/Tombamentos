<?php 
//função para redirecionar o usuario não logado para outra pagina 
include('../_login/restricao.php');
include("../_funcoes/inserir.php");

// Codigo para fazer upload da imagem

$data = time();


$_UP['pasta'] = '../../_documentos/'; # Pasta para onde vai os arquivos upados.
$_UP['tamanho'] = 1024 * 1024 * 2; # Tamanho de 2Mb
$_UP['extensoes'] = array('pdf'); # Extensões permitidas.
$_UP['renomeia'] = true; # Para evitar nomes repitidos

$extensao = strtolower(end(explode('.', $_FILES['nDocumento']['name']))); # Pegando a extensão do arquivo.

if(array_search($extensao, $_UP['extensoes']) === false) {  # Pesquisa dentro do array
    header("location:../../home.php?msg=erro-extensao");
    exit; # Para sair da execusão
}
else if($_UP['tamanho'] < $_FILES['nDocumento']['size']){
    header("location:../../home.php?msg=erro-tamanho");
    exit;
}

// Renomer antes de ser enviado pro sevidor.

else 
{
    if($_UP['renomeia'] == true){
        $nome_final = time().'.'.$extensao; # time(): pega o time atual e concatena na extensão para formar um novo nome.
    }
    else {
        $nome_final = $_FILES['nDocumento']['name'];
    }

    if(move_uploaded_file($_FILES['nDocumento']['tmp_name'], $_UP['pasta'] . $nome_final)){ // Fazendo o upload da imagem e criando um nome temporário

    }
    else {
        header("location:../../home.php?msg=erro-upload");
        exit;
    }
}

// Colocando os valores em arrays e adicionando no banco

inserir(array("nome", "codigo"), array($nome_final, time()), "cadastro_documento");

header("location:../../home.php?msg=enviado&arquivo=$nome_final"); # Direciona para outra pagina. Está enviado uma variável(get) pela url.

?>