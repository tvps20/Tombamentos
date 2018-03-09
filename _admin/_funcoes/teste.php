<?php 
include("inserir.php");
#include("select.php");
/*
$consulta = consulta("cadastro_usuario");

if($consulta == true)
{
    for($i=0; $i<count($consulta); $i++)
    {
        echo $consulta[$i]['id']."<br>";
        echo $consulta[$i]['nome']."<br>";
        echo $consulta[$i]['usuario']."<br>";
        echo $consulta[$i]['senha']."<br>";
        echo $consulta[$i]['status']."<br><br>";
    } 
}
else
{
    echo "sem resultado.";
}

*/
/*
include("atualizar.php");

atualizar(array("nome", "usuario", "status"), array("dddd", "ashauhdusa", "2"), "cadastro_usuario", "WHERE id = 120");
#atualizar("nome", "pedao", "cadastro_usuario", "WHERE id=99");
*/

$nome = "thiago";
$usuario = "tvps";
$senha ="i23.4";
$data = "17/12/1993";

@$cripSenha = crypt($senha); #criptografando a senha do usuário.

$data = '123';
inserir(array("nome", "usuario", "senha"), array($nome, $usuario, $cripSenha), "cadastro_usuario");
#inserir("codigo", $data, "cadastro_documento");

/*
$banco = "id2739015_assinaturas";
$hostname = "localhost";
$usuario = "id2739015_gsthiago";
$senha = "032293070";

$conect = @mysqli_connect($hostname, $usuario, $senha, $banco);

if($conect)
    echo "Conectou"."<br/>";
else
    echo "Não conectou"."<br/>";


/*
$banco = "banco_de_aquivos";
$hostname = "localhost";
$usuario = "root";
$senha = "";

$conect = @mysqli_connect($hostname, $usuario, $senha, $banco);

if($conect)
    echo "Conectou"."<br/>";
else
    echo "Não conectou"."<br/>";

/*
$cn = mysql_connect('localhost', 'root', '');
mysql_select_db('banco_de_aquivos', $cn);

$sql = "INSERT INTO user (login, senha) VALUES ('thiago', '456')";

$q = mysql_query($sql);

if($q)
    echo "Adicionou"."<br/>";
else
    echo "nao adicionou"."<br/>";
*/
?> 