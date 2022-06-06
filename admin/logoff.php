<?php
if (!isset($_SESSION)) {
   session_start();
}

#session_destroy(); //remover o arquivo de sessao($_Session)
#session_unset();// apaga todas as variaveis de sessao($_Session)
unset($_SESSION['usuario'], $_SESSION['nome'], $_SESSION['tipo']);
$_SESSION['logOff'] = "LogOff realiazado com sucesso";
header('Location:index.php');


?>