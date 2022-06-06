<?php
require_once('conexao/conecta.php');
if (isset($_POST['inserir'])&& $_POST['inserir'] == 'insere_comentario') {
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $comentario = mysqli_real_escape_string($con, $_POST['comentario']);
    $status = 'in';
    $id_livro = $_POST['id_livro'];
    date_default_timezone_set('America/Sao_Paulo'); //declarando horario default para trazer a data correta
    $data = date('Y-m-d');
    
   $sql = "INSERT INTO comentarios_tb (nome, email, data,comentario,status,id_liv) VALUES ('$nome', '$email','$data', '$comentario', '$status', '$id_livro')";
  
    if (mysqli_query($con,$sql)) {
    //   header('Location:comentario_enviado.php');
       header("refresh:5;url=insere.php?id_livro=$id_livro");
    }
    else
    {
      die("Erro:" . $sql . "<br>" . mysqli_error($con));
    }
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- resfresh atualiza automatico , tempo , a pag que eu quero , <meta http-equiv="Refresh" content="5; url=insere.php"> -->
    
    <title>Document</title>
    <link href="css/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <p>Ola visitante, seu comentario foi enviado com sucesso!</p>
    <p> Por favor, aguarde pela aprovação de um de nossos moderadores.</p>
</body>
</html>