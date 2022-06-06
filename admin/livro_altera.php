<?php
require_once('../conexao/conecta.php');
include_once('comum.php');
if (isset($_POST['alterar']) && $_POST['alterar']==='altera_livro') {
  $id_livro = $_POST['id_livro'];
  $data = $_POST['data'];
  $categoria = $_POST['categoria'];
  $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
  $resumo = mysqli_real_escape_string($con, $_POST['resumo']);
  $autor = mysqli_real_escape_string($con,$_POST['autor']);
  $paginaliv = mysqli_real_escape_string($con,$_POST['pagina']);
  $preco = mysqli_real_escape_string($con,$_POST['preco']);
  $imagem = mysqli_real_escape_string($con, $_POST['imagem']);
  $destaque= mysqli_real_escape_string($con, $_POST['destaque']);
  $editora = mysqli_real_escape_string($con,$_POST['editora']);
  $texto = mysqli_real_escape_string($con,$_POST['texto']);  

  $sql = "UPDATE livros_tb SET data='$data', categoria='$categoria', titulo='$titulo', resumo='$resumo', autor='$autor', pagina='$paginaliv',preco='$preco', imagem='$imagem', destaque='$destaque', editora='$editora', texto='$texto' WHERE id_livro=$id_livro";
  if (mysqli_query($con,$sql)) {
    header('Location:livros.php');
  }
  else{
    die("Erro:" . $sql . "<br>" . mysqli_error($con));
  }
}



if (isset($_GET['id_livro'])&& $_GET['id_livro'] !== '') {
  $id = $_GET['id_livro'];
  $sqllivro= "SELECT * FROM livros_tb WHERE id_livro=$id";
  $resultadolivro = mysqli_query($con,$sqllivro);
  $linhalivro = mysqli_fetch_assoc($resultadolivro);
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

    <h2>Livros Altera</h2>
    <div class="col-md-12 col-lg-8">
        <h4 class="mb-3">Dados do Livro</h4>
        <form class="needs-validation" method="POST" action="" novalidate>
          <div class="row g-3">

            <div class="col-sm-6">
              <label for="data" class="form-label">Data</label>
              <input type="date" class="form-control" id="data" name="data" value="<?php echo $linhalivro['data']?>" required>
              <div class="invalid-feedback">
                Selecione a data.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="categoria" class="form-label">Categoria</label>
              <select class="form-select" id="categoria" name="categoria" required>
                <option value="">- Selecione -</option>
                <?php do{?>
                <option value="<?php echo $linhatipo['value']?>" <?php if($linhalivro['categoria'] === $linhatipo['value']) echo"selected" ?> ><?php echo $linhatipo['label']?> </option>
                <?php }while($linhatipo = mysqli_fetch_assoc($resultadotipo))?>
              </select>
              <div class="invalid-feedback">
                Selecione o tipo.
              </div>
            </div>

            <div class="col-12">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $linhalivro['titulo']?>" placeholder="Título da notícia" required>
              <div class="invalid-feedback">
                Informe o título da notícia.
              </div>
            </div>

            <div class="col-12">
              <label for="resumo" class="form-label">Resumo</label>
              <textarea class="form-control" id="resumo" name="resumo" rows="2" required><?php echo $linhalivro['resumo']?></textarea>
              <div class="invalid-feedback">
                Informe o resumo da notícia.
              </div>
            </div>

            <div class="col-12">
              <label for="texto" class="form-label">Texto</label>
              <textarea class="form-control" id="texto" name="texto" rows="3" required><?php echo $linhalivro['texto']?></textarea>
              <div class="invalid-feedback">
                Informe o texto da notícia.
              </div>
            </div>

            <div class="col-12">
              <label for="autor" class="form-label">Autor</label>
              <textarea class="form-control" id="autor" name="autor" rows="3" required><?php echo $linhalivro['autor']?></textarea>
              <div class="invalid-feedback">
                Informe o/os autores do livro.
              </div>
            </div>

            <div class="col-6">
              <label for="pagina" class="form-label">Paginas</label>
              <textarea class="form-control" id="pagina" name="pagina" rows="3" required><?php echo $linhalivro['pagina']?></textarea>
              <div class="invalid-feedback">
                Informe a quantidade de paginas.
              </div>
            </div>
            
            <div class="col-6">
              <label for="preco" class="form-label">Preço</label>
              <textarea class="form-control" id="preco" name="preco" rows="3" required><?php echo $linhalivro['preco']?></textarea>
              <div class="invalid-feedback">
                Informe o preço.
              </div>
            </div>
            <div class="col-12">
              <label for="editora" class="form-label">Editora</label>
              <textarea class="form-control" id="editora" name="editora" rows="3" ><?php echo $linhalivro['editora']?></textarea>
              <div class="invalid-feedback">
                Informe a editora.
              </div>
            </div>


            <div class="col-12">
            <label for="imagem" class="form-label">Imagem</label>
              <select class="form-select" id="imagem" name="imagem">
                <option value="">- Selecione -</option>
                  <?php
                  $pasta = opendir('../img'); //abrir a pasta
                  while(($arquivo = readdir($pasta)) !== false )//le o diretorio quando tiver arquivo dentro , se nao tiver ele nao abre
                  {
                    if ($arquivo != '.' && $arquivo != '..' && $arquivo != 'Thumbs.db') {
                      
                   
                  ?>
                  <option value="<?php echo $arquivo ?>" <?php if($linhalivro['imagem'] === $arquivo) echo 'selected';?>><?php echo $arquivo ?></option>
                  <?php } 
                          } 
                    closedir($pasta);
                  ?>

              </select>
              <div class="invalid-feedback">
                Selecione a imagem.
              </div>
            </div>

           <div class="my-3">
           <label for="destaque" class="form-label">Destaque</label>
            <div class="form-check">
              <input id="dsim" name="destaque" value="sim" type="radio" class="form-check-input" required <?php if($linhalivro['destaque'] === 'sim') echo "checked"?>>
              <label class="form-check-label" for="dsim">Sim</label>
            </div>
            <div class="form-check">
              <input id="dnao" name="destaque" value="nao" type="radio" class="form-check-input" required  <?php if($linhalivro['destaque'] === 'nao') echo "checked"?>>
              <label class="form-check-label" for="dnao">Não</label>
            </div>
          </div>

          <hr class="my-4">
          <input type="hidden" name="alterar" value="altera_livro">
          <input type="hidden" name="id_livro" value="<?php echo $linhalivro['id_livro']?>">
          <button class="w-100 btn btn-warning btn-lg mb-5" type="submit">Alterar Livro</button>
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
