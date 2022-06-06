<?php
require_once('../conexao/conecta.php');
include_once('comum.php');

if (isset($_POST['inserir'])&& $_POST['inserir'] === 'insere_livro') {
  #gravando o nome do arquivo do upload
  $nome = basename($_FILES['imagem']['name']);
  #gravando um caminho temporario para a pasta tmp
  $temp = $_FILES['imagem']['tmp_name'];
  #declarando o caminho e o nome final do arquivo, "../imagens/$nome" 
  $final = "../imagens/" .$nome;
  #movendo o arquivo da pasta tmp para pasta imagens
  move_uploaded_file($temp,$final); 
  $data = $_POST['data'];
  $categoria = $_POST['categoria'];
  $titulo = mysqli_real_escape_string($con,$_POST['titulo']);
  $resumo = mysqli_real_escape_string($con,$_POST['resumo']);
  $texto = mysqli_real_escape_string($con,$_POST['texto']);  
  $autor = mysqli_real_escape_string($con,$_POST['autor']);
  $paginaliv = mysqli_real_escape_string($con,$_POST['pagina']);
  $preco = mysqli_real_escape_string($con,$_POST['preco']);
   // $imagem = mysqli_real_escape_string($con,$_POST['imagem']);
  $destaque =  $_POST['destaque'];
  $editora = mysqli_real_escape_string($con,$_POST['editora']);

$sql = "INSERT INTO livros_tb (data,categoria,titulo,resumo,texto,autor,pagina,preco,imagem,destaque,editora) VALUES ('$data', '$categoria', '$titulo','$resumo','$texto','$autor','$paginaliv','$preco','$nome','$destaque','$editora') ";
if (mysqli_query($con,$sql)) {
 header('Location:livros.php');
}else{
   die("Erro:" . $sql . "<br>" . mysqli_error($con)); // se fosse no normal seria apenas o erro sem as concatenacoes na frente
}

}

$sqltipo = "SELECT * FROM categorias_tb ORDER BY label ASC";
$resultadotipo = mysqli_query($con,$sqltipo);
$linhatipo = mysqli_fetch_assoc($resultadotipo);
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

    <h2>Livros Insere</h2>
    <div class="col-md-12 col-lg-8">
        <h4 class="mb-3">Dados do livros</h4>
        <form class="needs-validation" method="POST" action="" enctype="multipart/form-data" novalidate>
          <div class="row g-3">

            <div class="col-sm-6">
              <label for="data" class="form-label">Data</label>
              <input type="date" class="form-control" id="data" name="data" required>
              <div class="invalid-feedback">
                Selecione a data.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="categoria" class="form-label">Categoria</label>
              <select class="form-select" id="categoria" name="categoria" required>
                <option value="">- Selecione -</option>
                <?php do{?>
                <option value="<?php echo $linhatipo['value']?>"><?php echo $linhatipo['label']?></option>
                <?php }while($linhatipo = mysqli_fetch_assoc($resultadotipo))?>
              </select>
              <div class="invalid-feedback">
                Selecione o tipo.
              </div>
            </div>

            <div class="col-12">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título do Livro" required>
              <div class="invalid-feedback">
                Informe o título do livro.
              </div>
            </div>

            <div class="col-12">
              <label for="resumo" class="form-label">Resumo</label>
              <textarea class="form-control" id="resumo" name="resumo" rows="2" required></textarea>
              <div class="invalid-feedback">
                Informe o resumo do livro.
              </div>
            </div>

            <div class="col-12">
              <label for="texto" class="form-label">Texto</label>
              <textarea class="form-control" id="texto" name="texto" rows="2" required></textarea>
              <div class="invalid-feedback">
                Informe o texto do livro.
              </div>
            </div>

            <div class="col-12">
              <label for="autor" class="form-label">Autor</label>
              <textarea class="form-control" id="autor" name="autor" rows="3" required></textarea>
              <div class="invalid-feedback">
                Informe o/os autores do livro.
              </div>
            </div>

            <div class="col-6">
              <label for="pagina" class="form-label">Paginas</label>
              <textarea class="form-control" id="pagina" name="pagina" rows="3" required></textarea>
              <div class="invalid-feedback">
                Informe a quantidade de paginas.
              </div>
            </div>
            
            <div class="col-6">
              <label for="preco" class="form-label">Preço</label>
              <textarea class="form-control" id="preco" name="preco" rows="3" required></textarea>
              <div class="invalid-feedback">
                Informe o preço.
              </div>
            </div>
            <div class="col-12">
              <label for="editora" class="form-label">Editora</label>
              <textarea class="form-control" id="editora" name="editora" rows="3" ></textarea>
              <div class="invalid-feedback">
                Informe a editora.
              </div>
            </div>
            <!-- <div class="col-12">
              Inserindo imagem mmanualmente , escrevendo o nome da imagem e a extensão 
              <label for="imagem" class="form-label">Imagem</label>
              <input type="text" class="form-control" id="imagem" name="imagem" placeholder="Imagem da notícia">
              <div class="invalid-feedback">
                Informe a imagem da notícia.
              </div>
            </div> -->
            <div class="col-12">
              <label for="imagem" class="form-label">Imagem</label>
              <input type="file" class="form-control" id="imagem" name="imagem">
            </div>

           <div class="my-3">
           <label for="destaque" class="form-label">Destaque</label>
            <div class="form-check">
              <input id="dsim" name="destaque" value="sim" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="dsim">Sim</label>
            </div>
            <div class="form-check">
              <input id="dnao" name="destaque" value="nao" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="dnao">Não</label>
            </div>
          </div>

          <hr class="my-4">
          <input type="hidden" name="inserir" value="insere_livro">
          <button class="w-100 btn btn-warning btn-lg mb-5" type="submit">Inserir Livros</button>
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
