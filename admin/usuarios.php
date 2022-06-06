<?php 
require_once('../conexao/conecta.php');
include_once('supervisor.php');
$sql = "SELECT * FROM usuarios_tb ORDER BY id_usuario DESC";
$resultado = mysqli_query($con,$sql);
$linha = mysqli_fetch_assoc($resultado);
$quantidade = mysqli_num_rows($resultado);


if (isset($_GET['busca']) && $_GET['busca'] != '') {
  $busca = $_GET['busca'];
  $sql = "SELECT * FROM usuarios_tb WHERE CONCAT(nome,'',usuario) LIKE '%$busca%'";
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
        <form class="d-flex w-100" action="usuarios.php" method="GET">
  <input class="form-control me-2 w-100 mx-3" type="search" name="busca" placeholder="Busca" aria-label="Search">
      
   <button class="btn btn-dark" type="submit">Buscar</button>
 </form>
      </div>
 <?php if($linha > 0) {?>
    <h2>Usuários</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Usuário</th>
              <th scope="col">Senha</th>
              <th scope="col">Senha MD5</th>
              <th scope="col">Nome Completo</th>
              <th scope="col">Tipo</th>
              <th colspan="2" scope="col" class="text-center"><a href="usuario_insere.php">Inserir</a></th>
            </tr>
          </thead>
          <tbody>
          <?php do{?>
            <tr>
              <td> <?php echo $linha['id_usuario']?> </td>
              <td> <?php echo $linha['usuario']?></td>
              <td><?php echo $linha['senha']?></td>
              <td><?php echo $linha['senha_md5']?></td>
              <td><?php echo $linha['nome']?></td>
              <td><?php echo $linha['tipo']?></td>
              <td class="text-center"><a href="usuario_altera.php?id_usuario=<?php echo $linha['id_usuario']?>" class="text-decoration-none">Alterar</a></td>
              <td class="text-center"><a href="usuario_exclui.php?id_usuario=<?php echo $linha['id_usuario']?>" class="text-decoration-none">Excluir</a></td>
            </tr>
            <?php }while($linha= mysqli_fetch_assoc($resultado))?>      
           
          </tbody>
        </table>
      </div>
      <?php } else {?>
        <p class="h4">Não existe nenhum usuario com <b><?php echo $busca?></b></p>
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
