<!-- Começando o desenvolvimento em 21/08/2017 -->
<?php

@$erro = $_REQUEST['erro'];

?>
<!DOCTYPE html> <!-- Informa ao navegador que é um documento html -->
<html lang="pt-br"> <!-- Informar o idioma que vai ser escrito -->
    <head>
        <meta charset="utf-8"/> <!-- Informa ao nevegador que se está usando acentuação latina -->
        <title>Login</title>
        <link rel="stylesheet" href="_css/estiloCaixa.css"/>
        <link rel="stylesheet" href="_css/estiloLogin.css"/>
        <link rel="stylesheet" href="_css/estiloAvisos.css"/>
    </head>

    <body>
        <div id="boxPrincipal">
            <div id="boxInterno">

                <div id="entradaBoxLabel">Entrar</div>
                <form method="post" action="_admin/_login/login.php">
                    <div class="entradaDiv" id="entradaUsuario">
                        <input type="text" name="login" value="Usuário ou E-mail"/>
                    </div>

                    <div class="entradaDiv" id="entradaSenha">
                        <input type="text" name="senha" value="Senha"/>
                    </div>

                    <div id="botoes">
                        <div><button id="botao" type="submit">login</button></div>
                        <div id="LembrarSenha"><input type="Checkbox"/>Lembrar Minha Senha</div>
                    </div>
                </form>

                <div id="verificarBoxLabel">Verificar</div>

                <div>
                    <div class="entradaDiv">
                        <input  type="text" value="Código"/>
                    </div>
                </div>

                <div id="botoes">
                    <div id="botao">Buscar</div>
                </div>
               
            </div>
        </div>

        <?php if($erro == "negado"): ?>
            <section class="erroLogin">
                <p>Pagina Restrida! É preciso uma senha valida para acessar o sistema! </p>
            </section>
        <?php endif; ?>

        <?php if($erro == "usuario"): ?>
            <section class="erroLogin">
                <p>Usuario Informado não Existe!</p>
            </section>
        <?php endif; ?>

        <?php if($erro == "senha"): ?>
            <section class="erroLogin">
                <p>Senha Incorreta!</p>
            </section>
        <?php endif; ?>

        <!-- Rodapé -->
        <footer id="rodaPe">
            <p>GSantiago 2017, Todos os direitos resevados.</p>
        </footer>

    </body>
</html>