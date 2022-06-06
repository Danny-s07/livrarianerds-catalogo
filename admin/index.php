<?php
if (!isset($_SESSION)) {
  session_start();
}
?>





<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>

    <!-- Bootstrap core CSS -->
<link href="../css/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<!-- <main class="form-signin"> -->
  <!-- <form action="login.php" method="POST">
    <img class="mb-4" src="../img/literatura.jpg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Faça seu Login</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="usuario" placeholder="Usuário">
      <label for="floatingInput">Usuário</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Senha">
      <label for="floatingPassword">Senha</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

    <div> -->
       <!-- teste layout inicio modelo 01 - imagem de um lado e form do outro -->

<div class="container">
<div class="row">
<div class="col-md-6">
<img src="../img/literaturates.jpg" alt="Image" class="img-fluid" >
</div>
<div class="col-md-6 contents">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="mb-4">
<h3>Sign In</h3>
</div>
<form action="login.php" method="POST" autocomplete="off" >
<div class="form-group first mb-5">
<input type="text" class="form-control" id="floatingInput" name="usuario" placeholder="Usuário">
</div>
<div class="form-group last mb-5">
<input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Senha">
</div>
 <div class="d-flex mb-5 align-items-center">
<button class="w-100 btn btn-lg btn-dark" type="submit">Login</button>
</form>
</div>
</div>
</div>
<?php 
  //fazendo por bloco  individual
  if (isset($_SESSION['loginVazio'])) {
    #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula alert-warning(é a cor)
   echo '<div class="alert alert-primary alert-dismissible mt-2 fade show" role="alert">';
    echo $_SESSION['loginVazio'];
    unset($_SESSION['loginVazio']);
    #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula
   echo' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
   echo' </div>';
  }
  if (isset($_SESSION['loginErro'])) {
    #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula alert-warning(é a cor)
   echo '<div class="alert alert-warning alert-dismissible mt-2 fade show" role="alert">';
    echo $_SESSION['loginErro'];
    unset($_SESSION['loginErro']);
    #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula
   echo' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
   echo' </div>';
  }
  if (isset($_SESSION['naoAutorizado'])) {
    #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula alert-warning(é a cor)
   echo '<div class="alert alert-danger alert-dismissible mt-2 fade show" role="alert">';
    echo $_SESSION['naoAutorizado'];
    unset($_SESSION['naoAutorizado']);
    #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula
   echo' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
   echo' </div>';
  }

  if (isset($_SESSION['logOff'])) {
    #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula alert-warning(é a cor)
   echo '<div class="alert alert-success  alert-dismissible mt-2 fade show" role="alert">';
    echo $_SESSION['logOff'];
    unset($_SESSION['logOff']);
    #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula
   echo' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
   echo' </div>';
  }
?>
</div>

</div>
<!-- teste layout final  modelo 01 - imagem de um lado e form do outro -->

     <?php
      
    // construção de codigo em bloco geral  com apenas um alert com  apenas um alerte de mensagem soh trocando os textos
    //  if (isset($_SESSION['loginVazio']) || isset($_SESSION['loginErro']) || isset($_SESSION['naoAutorizado']) || isset($_SESSION['logOff'])) {
    //    #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula alert-warning(é a cor)
    //   echo '<div class="alert alert-warning alert-dismissible mt-2 fade show" role="alert">';
    //    echo $_SESSION['loginVazio'];
    //    unset($_SESSION['loginVazio']);
    //    echo $_SESSION['loginErro'];
    //    unset($_SESSION['loginErro']);
    //    echo $_SESSION['naoAutorizado'];
    //    unset($_SESSION['naoAutorizado']); 
    //    echo $_SESSION['logOff'];
    //    unset($_SESSION['logOff']);      
    //    #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula
    //   echo' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    //   echo' </div>';
    //  }
      
    //fazendo por bloco  individual
     //if (isset($_SESSION['loginVazio'])) {
      #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula alert-warning(é a cor)
     //echo '<div class="alert alert-primary alert-dismissible mt-2 fade show" role="alert">';
     // echo $_SESSION['loginVazio'];
     // unset($_SESSION['loginVazio']);
      #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula
     //echo' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
     //echo' </div>';
    //}
  //   if (isset($_SESSION['loginErro'])) {
  //     #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula alert-warning(é a cor)
  //    echo '<div class="alert alert-warning alert-dismissible mt-2 fade show" role="alert">';
  //     echo $_SESSION['loginErro'];
  //     unset($_SESSION['loginErro']);
  //     #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula
  //    echo' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
  //    echo' </div>';
  //   }
  //   if (isset($_SESSION['naoAutorizado'])) {
  //     #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula alert-warning(é a cor)
  //    echo '<div class="alert alert-danger alert-dismissible mt-2 fade show" role="alert">';
  //     echo $_SESSION['naoAutorizado'];
  //     unset($_SESSION['naoAutorizado']);
  //     #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula
  //    echo' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
  //    echo' </div>';
  //   }
     
  //   if (isset($_SESSION['logOff'])) {
  //     #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula alert-warning(é a cor)
  //    echo '<div class="alert alert-success alert-dismissible mt-2 fade show" role="alert">';
  //     echo $_SESSION['logOff'];
  //     unset($_SESSION['logOff']);
  //     #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula
  //    echo' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
  //    echo' </div>';
  //   }





  //    ?>
  <!-- //   </div> -->
  <!-- //   <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> -->
  <!-- // </form> -->
<!-- </main> -->


  <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>
