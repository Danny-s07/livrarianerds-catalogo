<?php
if (!isset($_SESSION)) {
   session_start();
}

if ($_SESSION['tipo'] !='sup' && $_SESSION['tipo'] !='com') {
   $_SESSION['naoAutorizado'] = "Somente usuarios cadastrados podem acessar o site";
   header('Location:index.php');
}

#adicionando redundancia ao codigo
if (!$_SESSION['usuario']) {
    $_SESSION['naoAutorizado'] = "Somente usuarios cadastrados podem acessar o site";
   header('Location:index.php');
}
?>