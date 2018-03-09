<?php

// Deslogando do sistema

session_start();
unset($_SESSION['logado']); # Destruida a variável de sessão logado.
header("location:../../index.php");

?>