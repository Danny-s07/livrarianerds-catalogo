<?php
require_once('../conexao/conecta.php');
include_once('comum.php');
$sql = "SELECT id_livro, data, categoria, titulo, imagem, destaque FROM livros_tb ORDER BY id_livro DESC";
$resultado = mysqli_query($con,$sql);
$linha = mysqli_fetch_assoc($resultado);
$quantidade = mysqli_num_rows($resultado);





if (isset($_GET['busca']) && $_GET['busca'] != '') {
  $busca = $_GET['busca'];
   $sql = "SELECT * FROM livros_tb WHERE CONCAT(titulo,'',resumo,'',autor) LIKE '%$busca%'";
   $resultado = mysqli_query($con,$sql);
   $linha = mysqli_fetch_assoc($resultado);
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
        <!-- <h1 class="h2">Administração</h1> -->
        <form class="d-flex w-100" action="livros.php" method="GET">
  <input class="form-control me-2 w-100 mx-3" type="search" name="busca" placeholder="Busca" aria-label="Search">
      
   <button class="btn btn-dark" type="submit">Buscar</button>
 </form>

      </div>
      <?php if($linha > 0) {?>  
    <h2>Livros</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Data</th>
              <th scope="col">Categoria</th>
              <th scope="col">Título</th>
              <th scope="col">Imagem</th>
              <th scope="col">Destaque</th>
              <th colspan="2" scope="col" class="text-center"><a href="livro_insere.php">Inserir</a></th>
            </tr>
          </thead>
          <tbody>
          <?php do{?>
            <tr>
              <td><?php echo $linha['id_livro']?></td>
              <td>
              <?php $data = date_create($linha['data']);
                echo date_format($data, 'd/m/Y');
              ?>
              </td>
              <td><?php echo $linha['categoria']?></td>
              <td><?php echo $linha['titulo']?></td>
              <td><?php echo $linha['imagem']?></td>
              <td><?php echo $linha['destaque']?></td>
              <td class="text-center"><a href="livro_altera.php?id_livro=<?php echo $linha['id_livro']?>" class="text-decoration-none">Alterar</a></td>
              <td class="text-center"><a href="livro_exclui.php?id_livro=<?php echo $linha['id_livro']?>" class="text-decoration-none">Excluir</a></td>
            </tr>
            <?php }while($linha= mysqli_fetch_assoc($resultado))?>                    
          </tbody>
        </table>
      </div>
      <?php } else {?>
        <p class="h4">Não existe nenhum livro  <b><?php echo $busca?></b></p>
       <?php }?> 
    </main>
  </div>
</div>
    <script src="../js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="../js/dashboard.js"></script>
  </body>
</html>
