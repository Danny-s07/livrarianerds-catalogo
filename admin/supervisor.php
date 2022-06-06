<?php
if (!isset($_SESSION)) {
   session_start();
}
#checando o tipo de usuario 
if ($_SESSION['tipo'] !='sup') {
    $_SESSION['naoSup'] = "Somente usuarios supervisores podem acessar esta area do site";
    header('Location:admin.php');
}


#adicionando redundancia ao codigo
if (!$_SESSION['usuario']) {
    $_SESSION['naoAutorizado'] = "Somente usuarios cadastrados podem acessar o site";
   header('Location:index.php');
}
?>