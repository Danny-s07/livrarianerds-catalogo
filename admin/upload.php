<?php 
include_once('comum.php');
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
        <form class="needs-validation" method="POST" action="" enctype="multipart/form-data" novalidate>
          <div class="row g-3"> 
            <div class="col-sm-12">
              <label for="imagem" class="form-label">Arquivo</label>
              <input type="file" class="form-control" id="imagem" name="imagem" required>
              <div class="invalid-feedback">
                Selecione a imagem.
              </div>
            </div>

            <div class="col-sm-12">
                <?php
                if (isset($_POST['inserir']) && $_POST['inserir'] === 'insere_imagem') {
                           
                #criando os valores e caminhos para o upload
                #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula
                 echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
                     
                $pasta = "../img/";
                $nome = basename($_FILES['imagem']['name']);
                $temporario = $_FILES['imagem']['tmp_name'];
                $final = $pasta.$nome;
                #filtrando por tipo de imagem, strtolower()-converte pra minusculo
                $imagemtipo = strtolower(pathinfo($final,PATHINFO_EXTENSION));
                #criando uma variavel de "validacao de controle" do upload
                $uploadok = 1;
                #verificando se existe uma imagem sendo enviada com base no tamanho do arquivo
                $check = getimagesize($temporario);
                if ($check !== false) {
                  echo "O arquivo é uma imagem da extensão:" .$check['mime'] . "<br>";
                  $uploadok = 1;
                } 
                else
                {
                  echo "Envie apenas arquivos de imagem . Ex: jpg, png, gif, etc ...<br>";
                  $uploadok = 0;
                }
                #limitando as extensoes de arquivo
                if ($imagemtipo != 'jpg' && $imagemtipo !='jpeg' && $imagemtipo != 'png' && $imagemtipo != 'gif') {
                  echo "envie somente as extensoes jpg , jpeg, png e gif. <br>";
                  $uploadok = 0;
                }
                #checando se o arquivo ja existe na pasta
                if (file_exists($final)) {
                  echo "Já existe um arquivo com este nome na pasta. <br>";
                  $uploadok = 0;
                }
                #limitando envio por tamanho de arquivo
                if ($_FILES['imagem']['size'] > 500000) {
                  echo "Envie arquivos de tamanho maximo 500 kb . <br>";
                  $uploadok = 0;
                }
                #chegando se a variavel upload ok é zero
                if ($uploadok === 0) {
                  echo "O arquivo $nome não pode ser enviado. <br>";
                }
                else{
                  if (move_uploaded_file($temporario,$final)) {
                    echo "O arquivo $nome foi enviado com sucesso. <br>";
                  }
                  else{
                    echo "Erro ao enviar, tente novamente. <br>";
                  }
                }
                 #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula
                echo' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo' </div>';
              }
                ?>
            </div>

          <hr class="my-4">
          <input type="hidden" name="inserir" value="insere_imagem">
          <button class="w-100 btn btn-dark btn-lg mb-5" type="submit">Inserir Imagem</button>
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
