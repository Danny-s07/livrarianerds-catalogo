<?php
require_once('../conexao/conecta.php');
include_once('supervisor.php');
if (isset($_POST['inserir'])&& $_POST['inserir'] == 'insere_usuario') {
  $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
  $senha = mysqli_real_escape_string($con, $_POST['senha']);
  $senhamd5 = md5(mysqli_real_escape_string($con, $_POST['senha']));
  $nome = mysqli_real_escape_string($con, $_POST['nome']);
  $tipo = mysqli_real_escape_string($con, $_POST['tipo']);

  $sql = "INSERT INTO usuarios_tb (usuario, senha,senha_md5,nome,tipo) VALUES ('$usuario', '$senha', '$senhamd5', '$nome', '$tipo')";

  if (mysqli_query($con,$sql)) {
    header('Location:usuarios.php');
  }
  else
  {
    die("Erro:" . $sql . "<br>" . mysqli_error($con));
  }
  
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
    <title>Dashboard Template · Bootstrap v5.1</title>

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
    <link href="../css/css/dashboard.css" rel="stylesheet">
    <link href="../css/css/form-validation.css" rel="stylesheet">
  </head>
  <body>
    
  <?php
    #Início TOPO
    include('topo.php');
    #Final TOPO
  ?>

<div class="container-fluid">
  <div class="row">
  <?php
    #Início MENU
    include('navegacao.php');
    #Final MENU
  ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Administração</h1>
      </div>

    <h2>Usuários Insere</h2>
    <div class="col-md-12 col-lg-8">
        <h4 class="mb-3">Dados do usuário</h4>
        <form class="needs-validation" method="POST" action="" novalidate>
          <div class="row g-3">

            <div class="col-sm-6">
              <label for="usuario" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" maxlength="24" required>
                <div class="invalid-feedback">
                  Informe o username.
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <label for="senha" class="form-label">Senha</label>
              <input type="text" class="form-control" id="senha" name="senha" maxlength="8"  placeholder="senha" required>
              <div class="invalid-feedback">
                Informe a senha.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="nome" class="form-label">Nome Completo</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="nome completo" required>
              <div class="invalid-feedback">
                Informe o nome completo.
              </div>
            </div>

          <div class="my-3">
           <label for="destaque" class="form-label">Tipo</label>
            <div class="form-check">
              <input id="tsup" name="tipo" value="sup" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="tsup">Supervisor</label>
            </div>
            <div class="form-check">
              <input id="tcom" name="tipo" value="com" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="tcom">Comum</label>
            </div>
          </div>

          <hr class="my-4">
          <input type="hidden" name="inserir" value="insere_usuario">
          <button class="w-100 btn btn-warning btn-lg mb-5" type="submit">Inserir Usuário</button>
        </form>
      </div>
    </main>
  </div>
</div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/form-validation.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="../js/dashboard.js"></script>
  </body>
</html>
