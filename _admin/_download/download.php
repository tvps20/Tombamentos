<?php 
include('../_login/restricao.php');
include("../_funcoes/select.php");

//Imposibilitando o sql inject
$GetParam = filter_input(INPUT_GET, "nome", FILTER_DEFAULT);

//$consultar = consulta("cadastro_documento", "*", "WHERE nome = '$GetParam'");

//for($i = 0; $i < count($consultar); $i++)
//{
//    $documento = $consultar[$i]['nome'];
//}

//Função responsável por enviar Headers ao sevidor.
function InputHeader($nomeDoArquivo, $caminhoDoArquivo)
{
    header("Content-disposition: attachament; filename={$nomeDoArquivo}");
    header("Content-type: application/pdf");
    readfile($caminhoDoArquivo);
}


$fileName = $GetParam;
$filePath = "../../_documentos/{$fileName}";
InputHeader($fileName, $filePath);

header("location:../../home.php");



?>