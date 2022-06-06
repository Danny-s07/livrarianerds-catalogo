<?php
require_once('../conexao/conecta.php');
include_once('comum.php');
$nomeusuario = $_SESSION['nome'];


#busca retornando na propria pagina por status
$sqlbusca = "SELECT comentarios_tb.id_comentario,comentarios_tb.nome, comentarios_tb.email,comentarios_tb.comentario,comentarios_tb.data,comentarios_tb.status,livros_tb.titulo FROM comentarios_tb  INNER JOIN livros_tb ON comentarios_tb.id_liv = livros_tb.id_livro WHERE  status='in' ";
   $resultadobusca = mysqli_query($con,$sqlbusca);
   $linhabusca = mysqli_fetch_assoc($resultadobusca);



#exibindo os comentarios para moderacao
$sql = "SELECT comentarios_tb.id_comentario,comentarios_tb.nome, comentarios_tb.email,comentarios_tb.comentario,comentarios_tb.data,comentarios_tb.status,livros_tb.titulo FROM comentarios_tb  INNER JOIN livros_tb ON comentarios_tb.id_liv = livros_tb.id_livro WHERE status='in' ORDER BY id_comentario ASC ";
// $sql = "SELECT * FROM comentarios_tb WHERE status='in' ORDER BY id_comentario ASC";
$resultado = mysqli_query($con,$sql);
$linha = mysqli_fetch_assoc($resultado);
$quantidade = mysqli_num_rows($resultado);




if (isset($_POST['altera']) && $_POST['altera'] === 'altera_comentario') {
  $id_comentario = $_POST['id_comentario'];

  if (isset($_POST['aprovar'])&& $_POST['aprovar'] ==='sim') {
    $sql = "UPDATE comentarios_tb SET status='ap' WHERE id_comentario=$id_comentario";

    if (mysqli_query($con,$sql)) {
      header('Location:admin.php');
    }
    else{
      die("Erro:" .$sql . "<br>" . mysqli_error($con));
    }
  }

  if (isset($_POST['aprovar'])&& $_POST['aprovar'] ==='nao') {
    $sql = "UPDATE comentarios_tb SET status='rp' WHERE id_comentario=$id_comentario";

    if (mysqli_query($con,$sql)) {
      header('Location:admin.php');
    }
    else{
      die("Erro:" .$sql . "<br>" . mysqli_error($con));
    }
  }
 
  
}

if (isset($_GET['busca']) && $_GET['busca'] != '') {
  $busca = $_GET['busca'];

  $sql = "SELECT comentarios_tb.id_comentario,comentarios_tb.nome, comentarios_tb.email,comentarios_tb.comentario,comentarios_tb.data,comentarios_tb.status,livros_tb.titulo FROM comentarios_tb  INNER JOIN livros_tb ON comentarios_tb.id_liv = livros_tb.id_livro WHERE CONCAT(nome,'',titulo) LIKE '%$busca%' AND status='in'";
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
   <!-- inicio estrutura modular -->
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
  <!--  fim estrutura modular -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h2">Administração</h1> -->
        <form class="d-flex w-75" action="admin.php" method="GET">
  <input class="form-control me-2 w-50 mx-3" type="search" name="busca" placeholder="Busca" aria-label="Search">
      
   <button class="btn btn-dark" type="submit">Buscar</button>
 </form>
        <h2 class="h3">
       Olá, <?php echo $nomeusuario?> 
        </h2>
        
      </div>

   
   <?php
        //fazendo por bloco  individual
        if (isset($_SESSION['naoSup'])) {
          #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula alert-warning(é a cor)
        echo '<div class="alert alert-warning alert-dismissible mt-2 fade show" role="alert">';
          echo $_SESSION['naoSup'];
          unset($_SESSION['naoSup']);
          #convertendo o html para php --- colocando apenas um eco e aspas simples no começo e final e ponto e virgula
        echo' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo' </div>';
        }
    ?>
    
  <?php if($linhabusca > 0) {?>
    <?php if($linha > 0) {?>
    <h2>Comentarios para moderação :</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Comentario</th>
              <th scope="col">Data</th>
              <th scope="col">Titulo do Livro</th>
              <th scope="col">Status</th>
              <th colspan="3" class="text-center">Aprovações</th>
            </tr>
          </thead>
          <tbody>
            <?php do{?>
            <tr>
            <td><?php echo $linha ['id_comentario']?></td>
                <td><?php echo $linha ['nome']?></td>
                <td><?php echo $linha ['email']?></td>
                <td><?php echo $linha ['comentario']?></td>
                <td><?php $data = date_create($linha['data']);
                echo date_format($data, 'd/m/Y');?>
              </td>
              <td><?php echo $linha ['titulo']?></td>
              <td><?php echo $linha ['status']?></td>
              <td>
                  <form action="" method="POST">
                      <input type="hidden" name="altera" value="altera_comentario">
                    <input type="hidden" name="id_comentario" value="<?php echo $linha['id_comentario']?>">
                    <button type="submit" name="aprovar" class="btn btn-success" value="sim">Aprovar</button>
                    <button type="submit" name="aprovar" class="btn btn-danger" value="nao">Reprovar</button>
                  </form>
              </td>
            </tr>
            <?php } while($linha = mysqli_fetch_assoc($resultado))?>
          </tbody>
        </table>
      </div>
      <?php } else {?>
        <h2>Não existe resultado para o termo <?php  echo $busca ?></h2>
       <?php }?>
       <?php } else{?>
        <h2>Todos os comentarios ja foram moderados</h2>
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
