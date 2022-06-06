<?php 
require_once('../conexao/conecta.php');
include_once('comum.php');
//excluindo os dados
if (isset($_POST['remove'])&& $_POST['remove']==='sim') {
  $id_categoria= $_POST['id_categoria'];
  $sql = "DELETE FROM categorias_tb WHERE id_categoria=$id_categoria";

  if (mysqli_query($con,$sql)) {
    header('Location:categorias.php');
  }
  else
  {
    die("Erro:" .$sql. "<br>" .mysqli_error($con));
  }
}

//caso clique  no botao cancelar 
if (isset($_POST['remove'])&& $_POST['remove']==='nao') {
  header('Location:categorias.php');
}

//carregando os dados 
if (isset($_GET['id_categoria'])&& $_GET['id_categoria'] != '') {
  $id = $_GET['id_categoria'];
  $sqltipo = "SELECT id_categoria, label FROM categorias_tb WHERE id_categoria=$id";
  $resultadotipo = mysqli_query($con,$sqltipo);
  $linhatipo = mysqli_fetch_assoc($resultadotipo);
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

    <h2>Tipo Exclui</h2>
    <div class="col-md-12 col-lg-8">
        <h4 class="mb-3">Você confirma a exclusão do tipo: </h4>
        <form class="needs-validation" method="POST" action="" novalidate>
          <div class="row g-3">

            <div class="col-12">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $linhatipo['label']?>" readonly>
              <div class="invalid-feedback">
                Informe o título da notícia.
              </div>
            </div>



          <hr class="my-4">
          <input type="hidden" name="excluir" value="exclui_tipo">
          <input type="hidden" name="id_categoria" value=" <?php echo $linhatipo['id_categoria']?>">
          <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-danger" type="submit" value="sim" name="remove">Excluir</button>
            <button class="btn btn-warning" type="submit" value="nao" name="remove">Cancelar</button>
         </div>
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
