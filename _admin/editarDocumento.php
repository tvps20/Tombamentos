<!-- Começando o desenvolvimento em 21/08/2017 -->
<?php 

@$dados = $_REQUEST['msg'];
@$id= $_REQUEST['id'];
@$arquivo = $_REQUEST['arquivo'];

?>

<!DOCTYPE html> <!-- Informa ao navegador que é um documento html -->
<html lang="pt-br"> <!-- Informar o idioma que vai ser escrito -->
    <head>
        <meta charset="utf-8"/> <!-- Informa ao nevegador que se está usando acentuação latina -->
        <link rel="stylesheet" href="../_css/estiloInterface.css"/>
        <link rel="stylesheet" href="../_css/estiloHome.css"/>
        <link rel="stylesheet" href="../_css/estiloAvisos.css"/>
        <title>Home</title>
    </head>

    <body>
        <div id="boxPrincipal">
            <div id="conteudo">
                <header> <!-- Cabeçalho -->
                    <h1>Editar Documento</h1>
                </header> 

                <?php include_once "menu2.php" ?> <!-- Fazer um include da pagina de rodapé -->

                <section id="dados">
                    <fieldset> <!-- Conjunto de campos -->
                        <form action="_updates/editarArquivo.php" method="POST" enctype="multipart/form-data">                       
                            <legend>
                                <p><label for="iDocumento"><input type="file" name="nDocumento" id="documento"/></label></p> <!-- Enviar imagem -->
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <p><button id="botao" type="submit">Atualizar</button></p>
                            </legend>                          
                        </form>
                    </fieldset>
                    
                    <fieldset id="dam">
                            <p><input type="texto" placeholder="<?php echo $arquivo; ?>" size="30" readonly/></p> <!-- Mostra uma caixa de texto com informações onde não pode digitar -->
                            <p><button id="botao" type="submit">Download</button></p> <!-- Botão de enviar os dados -->                                                  
                    </fieldset>
                </section>
            </div>

            <!-- Verificando se os dados foram inseridos no banco e mostrando mensagens -->
            <?php if($dados == "enviado"): ?>
                <section class="dadosEnviados">
                    <p>Arquivo enviado com sucesso!</p>
                </section>
		    <?php endif; ?>

            <?php if($dados == "erro-extensao"): ?>
                <section class="dadosEnviados">
                    <p>Por favor, envie arquivos somente em formato pdf.</p>
                </section>
		    <?php endif; ?>

            <?php if($dados == "erro-tamanho"): ?>
                <section class="dadosEnviados">
                    <p>O tamanho da imagem é superio a 2mb!</p>
                </section>
		    <?php endif; ?>  

            <?php if($dados == "erro-upload"): ?>
                <section class="dadosEnviados">
                    <p>Erro no servidor! Tente novamente!</p>
                </section>
		    <?php endif; ?> 
        </div>

        <!-- Rodapé -->
        <?php include_once "../footer.php" ?> <!-- Fazer um include da pagina de rodapé -->
        
    </body>
</html>