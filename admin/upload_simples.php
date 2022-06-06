<?php
if (isset($_POST['inserir']) && $_POST['inserir'] === 'insere_imagem') {
  #gravando o nome do arquivo do upload
  $nome = basename($_FILES['imagem']['name']);
  #gravando um caminho temporario para a pasta tmp
  $temp = $_FILES['imagem']['tmp_name'];
  #declarando o caminho e o nome final do arquivo, "../imagens/$nome" 
  $final = "../imagens/" .$nome;
  #movendo o arquivo da pasta tmp para pasta imagens
  move_uploaded_file($temp,$final); 

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

    <h2>Upload</h2>
    <div class="col-md-12 col-lg-8">
        <h4 class="mb-3">Envio de imagens</h4>
        <form class="needs-validation" method="POST" action="" enctype="multipart/form-data" accept="image/*" novalidate>
          <div class="row g-3">
              
            <div class="col-sm-12">
              <label for="imagem" class="form-label">Arquivo</label>
              <input type="file" class="form-control" id="imagem" name="imagem" required>
              <div class="invalid-feedback">
                Selecione a imagem.
              </div>
            </div>

          <hr class="my-4">
          <input type="hidden" name="inserir" value="insere_imagem">
          <button class="w-100 btn btn-primary btn-lg mb-5" type="submit">Inserir Imagem</button>
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
