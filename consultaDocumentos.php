<?php 
include("_admin/_funcoes/select.php");

@$dados = $_REQUEST['msg'];
$consultar = consulta("cadastro_documento", "*", null, "ORDER BY nome ASC", "limit 10");

?>
<!DOCTYPE html> <!-- Informa ao navegador que é um documento html -->
<html lang="pt-br"> <!-- Informar o idioma que vai ser escrito -->
    <head>
        <meta charset="utf-8"/> <!-- Informa ao nevegador que se está usando acentuação latina -->
        <link rel="stylesheet" href="_css/estiloInterface.css"/>
        <link rel="stylesheet" href="_css/estiloconsulta.css"/>
        <link rel="stylesheet" href="_css/estiloAvisos.css"/>
        <title>Home</title>
    </head>

    <body>
        <div id="boxPrincipal">
            <div id="conteudo">
                <header> <!-- Cabeçalho -->
                    <h1>Consulta</h1>
                    <?php include_once "menuDeslogar.php" ?>
                </header> 

                <?php include_once "menu.php" ?> <!-- Fazer um include da pagina de rodapé -->

                <section id="dados">                  
                    <table id="tabela">
                        <tr>
                            <td class="topo"><a href="consultaDocumentos.php?ordem=id"/>Codigo</a></td>
                            <td class="topo"><a href="consultaDocumentos.php?ordem=nome"/>Nome</a></td>
                            <td class="topo"><a href="consultaDocumentos.php?ordem=usuario"/>Descrição</a></td>
                            <td class="topo"><a href="consultaDocumentos.php?ordem=status"/>Codigo</a></td>
                            <td class="topo">Editar/Excluir</td>
                        </tr>
                        <?php  
                            if($consultar == true){
                                for($i = 0; $i < count($consultar); $i++){
                        ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $consultar[$i]['nome'] ?></td>
                                <td><?php echo $consultar[$i]['descricao'] ?></td>
                                <td><?php echo $consultar[$i]['codigo'] ?></td>
                                <td><a id="ed" href="_admin/editarDocumento.php?id=<?php echo $consultar[$i]['id']; ?>">Editar</a>/<a id="ex" href="admin/processaExcluir.php?id=<?php echo $consultar[$i]['id']; ?>">Excluir</a></td>
                            </tr>
                        <?php  
                                }
                            }
                            else
                            {
                                echo "Nenhum dado encontrado!";
                            }
                        ?>
                    </table>
                </section>
            </div>

            <?php if($dados == "atualizado"): ?>
                <section class="dadosEnviadosEditar">
                    <p>Edição Concluida com sucesso!</p>
                </section>
		    <?php endif; ?>

            <?php if($dados == "ndAtualizado"): ?>
                <section class="dadosEnviadosEditar">
                    <p>Nenhuma edição Realizada!</p>
                </section>
		    <?php endif; ?>

        </div>
    
    <!-- Rodapé -->
    <?php include_once "footer.php" ?> <!-- Fazer um include da pagina de rodapé -->
        
    </body>
</html>