<!-- Menu -->
<?php 
include('_admin/_login/restricao.php');

@session_start();

@$status = $_SESSION['status'];
?>
<nav id="menu">
    <ul>
        <?php if($status == "ADMIN"): ?>
            <li><a href="home.php" class="selecionado">Home</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="consultaDocumentos.php">Documentos</a></li>
            <li><a href="consultaUsuarios.php">Usuarios</a></li>
            <li><a href="#">Contato</a></li>
        <?php else: ?>
            <li><a href="home.php" class="selecionado">Home</a></li>
            <li>Cadastro</li>
            <li>Documentos</li>
            <li>Usuarios</li>
            <li><a href="#">Contato</a></li>
        <?php endif ?>
    </ul>
</nav>