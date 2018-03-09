<?php 
include("../_funcoes/conexao.php");
include("../_funcoes/fechar_conexao.php");
include("../_funcoes/select2.php");

$user= htmlspecialchars(strip_tags($_REQUEST['login']));
$senha= htmlspecialchars(strip_tags($_REQUEST['senha']));

$consulta = consulta("cadastro_usuario", "*", "WHERE usuario = '$user'");

if($consulta == true)
{
    for($i=0; $i<count($consulta); $i++)
    {
        if(crypt($senha, $consulta[$i]['senha']) == $consulta[$i]['senha'])
        {
            session_start();
            $_SESSION['status'] = $consulta[$i]['status'];
            $_SESSION['usuario'] = $user;
            $_SESSION['logado'] = true;
            //Mandando para a pagina onde rerifica-se se a sessão foi criada.
            header("location:../../home.php");
        }
        else{
            header("location:../../index.php?erro=senha");
        }
    }
}
else
{
    header("location:../../index.php?erro=usuario");
}

?>