<?php
require_once('../conexao/conecta.php');

if (!isset($_SESSION)) {
   session_start();
}

if (isset($_POST['usuario'])&& $_POST['usuario'] != '' && isset($_POST['senha']) && $_POST['senha'] != '') {
    $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
    $senha = md5(mysqli_real_escape_string($con, $_POST['senha']));
    $sql = "SELECT * FROM usuarios_tb WHERE usuario='$usuario' AND senha_md5 = '$senha'";
    $resultado = mysqli_query($con,$sql);
    $linha = mysqli_fetch_assoc($resultado);
    if (isset($linha)) {
        $_SESSION['id'] = $linha['id_usuario'];
        $_SESSION['usuario'] = $linha['usuario'];
        $_SESSION['nome'] = $linha['nome'];
        $_SESSION['tipo'] = $linha['tipo'];
        if ($_SESSION['tipo'] === 'sup' || $_SESSION['tipo'] === 'com') {
            header('Location:admin.php');
        }else{
            $_SESSION['naoAutorizado'] = "Apenas usuarios cadastrados podem acessar o site";
            header('Location:index.php');
        }
    }
    else{
        $_SESSION['loginErro'] = "Usuario ou Senha Invalido !";
        header('Location:index.php');
    }
}
else{
    $_SESSION['loginVazio'] = "Usuario ou senha vazio !";
    header('Location:index.php');
}

?>