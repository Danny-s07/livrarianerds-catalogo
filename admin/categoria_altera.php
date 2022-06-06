<?php
require_once('../conexao/conecta.php');
include_once('comum.php');
if (isset($_POST['alterar'])&& $_POST['alterar'] === 'altera_tipo') {
  $id_categoria = $_POST['id_categoria'];
  $value = mysqli_real_escape_string($con,$_POST['value']);
  $label =mysqli_real_escape_string($con, $_POST['label']);

  $sql = "UPDATE categorias_tb SET value='$value', label='$label' WHERE id_categoria=$id_categoria";
  if (mysqli_query($con,$sql)) {
    header('Location:categorias.php');
  }
   else{
     die("Erro:" . $sql . "<br>" . mysqli_error($con));
   }
}

if (isset($_GET['id_categoria'])&& $_GET['id_categoria'] !== '') {
  $id = $_GET['id_categoria'];
  $sqltipo = "SELECT * FROM categorias_tb WHERE id_categoria=$id";
  $resultadotipo = mysqli_query($con, $sqltipo);
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

    <h2>Tipos Altera</h2>
    <div class="col-md-12 col-lg-8">
        <h4 class="mb-3">Dados do tipo</h4>
        <form class="needs-validation" method="POST" action="" novalidate>
          <div class="row g-3">
              
            <div class="col-sm-6">
              <label for="value" class="form-label">Abreviação</label>
              <input type="text" class="form-control" id="value" name="value" maxlength="4" value="<?php echo $linhatipo['value']?>" required>
              <div class="invalid-feedback">
                Informe o campo abreviado.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="label" class="form-label">Legenda</label>
              <input type="text" class="form-control" id="label" name="label" value="<?php echo $linhatipo['label']?>"required>
              <div class="invalid-feedback">
                Informe o tipo de notícia.
              </div>
            </div>


          <hr class="my-4">
          <input type="hidden" name="alterar" value="altera_tipo">
          <input type="hidden" name="id_categoria" value="<?php echo $linhatipo['id_categoria']?>">
          <button class="w-100 btn btn-warning btn-lg mb-5" type="submit">Alterar Tipo</button>
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
