<?php 

@$dados = $_REQUEST['msg'];

?>
<!DOCTYPE html> <!-- Informa ao navegador que é um documento html -->
<html lang="pt-br"> <!-- Informar o idioma que vai ser escrito -->
    <head>
        <meta charset="utf-8"/> <!-- Informa ao nevegador que se está usando acentuação latina -->
        <link rel="stylesheet" href="_css/estiloInterface.css"/>
        <link rel="stylesheet" href="_css/estiloCadastro.css"/>
        <link rel="stylesheet" href="_css/estiloAvisos.css"/>
        <title>Home</title>
    </head>

    <body>
        <div id="boxPrincipal">
            <div id="conteudo">
                <header> <!-- Cabeçalho -->
                    <h1>Cadastro</h1>
                    <?php include_once "menuDeslogar.php" ?>
                </header> 

                <?php include_once "menu.php" ?> <!-- Fazer um include da pagina de rodapé -->

                <section id="dados">
                    <fieldset> <!-- Conjunto de campos -->
                        <form action="_admin/_inserts/inserirUsuario.php" method="POST">                       
                            <legend>
                                <p><label>Nome completo<input type="text" name="nNome"/></label></p>
                                <p><label>Usuario<input type="text" name="nUsuario" required/></label></p>
                                <p><label>Senha<input type="text" name="nSenha" required/></label></p>
                                <p><label>Data e Hora<input type="datetime-local" name="nData"/></label></p>
                                
                                <p><label for="iStatus">Status:</label> 
                                    <select name="nStatus" id="iStatus"> <!-- Cria caixa combinadas -->
                                        <option value="1">Usuario</option> <!-- Opção -->
                                        <option value="2">Admin</option>
                                        <option value="3">Destivado</option>
                                    </select>
						        </p>
                                
                                <p><button id="botao" type="submit">Enviar</button></p>
                            </legend>                          
                        </form>
                    </fieldset>
                </section>
            </div>

            <!-- Verificando se os dados foram inseridos no banco e mostrando mensagem -->
            <?php if($dados == "enviado"): ?>
                <section class="dadosEnviados">
                    <p>Dados Guardado com Sucesso!</p>
                </section>
		    <?php endif; ?>

        </div>
    
    <!-- Rodapé -->
    <?php include_once "footer.php" ?> <!-- Fazer um include da pagina de rodapé -->
        
    </body>
</html>