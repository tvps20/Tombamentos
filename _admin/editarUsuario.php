<?php 
include("_funcoes/select.php");

@$dados = $_REQUEST['msg'];
$id= $_REQUEST['id'];
$consultar = consulta("cadastro_usuario", "*", "WHERE id = '$id'", "ORDER BY nome ASC", "limit 10");

?>
<!DOCTYPE html> <!-- Informa ao navegador que é um documento html -->
<html lang="pt-br"> <!-- Informar o idioma que vai ser escrito -->
    <head>
        <meta charset="utf-8"/> <!-- Informa ao nevegador que se está usando acentuação latina -->
        <link rel="stylesheet" href="../_css/estiloInterface.css"/>
        <link rel="stylesheet" href="../_css/estiloCadastro.css"/>
        <link rel="stylesheet" href="../_css/estiloAvisos.css"/>
        <title>Home</title>
    </head>

    <body>
        <div id="boxPrincipal">
            <div id="conteudo">
                <header> <!-- Cabeçalho -->
                    <h1>Editar Usuario</h1>
                </header> 

                <?php include_once "menu2.php" ?> <!-- Fazer um include da pagina de rodapé -->

                <section id="dados">
                    <fieldset> <!-- Conjunto de campos -->

                    <?php  
                        if($consultar == true){
                            for($i = 0; $i < count($consultar); $i++){
                    ?>

                        <form action="_updates/editarUsuario.php" method="POST">                       
                            <legend>
                                <p><label>Nome completo<input type="text" name="nNome" value="<?php echo $consultar[$i]['nome'];?>"/></label></p>
                                <p><label>Usuario<input type="text" name="nUsuario" value="<?php echo $consultar[$i]['usuario'];?>" required/></label></p>
                                <p><label>Senha<input type="text" name="nSenha" value="<?php echo $consultar[$i]['senha'];?>" required/></label></p>
                                <p><label>Nova Senha<input type="text" name="nNovaSenha" required/></label></p>
                                
                                <p><label for="iStatus">Status:</label> 
                                    <select name="nStatus" id="iStatus"> <!-- Cria caixa combinadas -->
                                        <option value="1">Usuario</option> <!-- Opção -->
                                        <option value="2">Admin</option>
                                        <option value="3">Destivado</option>
                                    </select>
						        </p>
                                
                                <input type="hidden" name="id" value="<?php echo $id;?>"> <!-- Caixa que não aparece no html para passar o id -->

                                <p><button id="botao" type="submit">Atualizar</button></p>
                            </legend>                          
                        </form>

                        <?php  
                                }
                            }
                            else
                            {
                                echo "Nenhum dado encontrado!";
                            }
                        ?>

                    </fieldset>
                </section>
            </div>

            <!-- Verificando se os dados foram inseridos no banco e mostrando mensagem -->
            <?php if($dados == "atualizado"): ?>
                <section class="dadosEnviados">
                    <p>Edição Concluida com sucesso!</p>
                </section>
		    <?php endif; ?>

        </div>
    
    <!-- Rodapé -->
    <?php include_once "../footer.php" ?> <!-- Fazer um include da pagina de rodapé -->
        
    </body>
</html>