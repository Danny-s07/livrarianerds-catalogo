<?php 
require_once('conexao/conecta.php');
//saida de dados com exibição ou nao da noticia se tiver um id
if (isset($_GET['id_livro'])&& $_GET['id_livro'] != '') {
  $id_livro = $_GET['id_livro'];
  $sql = "SELECT * FROM livros_tb WHERE id_livro=$id_livro";
  $resultado = mysqli_query($con,$sql);
  $linha = mysqli_fetch_assoc($resultado);
  $quantidade = mysqli_num_rows($resultado); //contagem pra trazer as noticias



 //exibindo os comentarios pos iframe
 $sqlcomentario = "SELECT * FROM comentarios_tb WHERE id_liv=$id_livro AND status='ap' ORDER BY id_comentario DESC";
 $resultadocomentario = mysqli_query($con,$sqlcomentario);
 $linhacomentario = mysqli_fetch_assoc($resultadocomentario);
 $quantidadecoemntario = mysqli_num_rows($resultadocomentario);
}else{
  $quantidade = 0;
}
 
?>




<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>LivrariaNerds Catalago</title>
	<meta charset="UTF-8">
	<meta name="description" content="Game Warrior Template">
	<meta name="keywords" content="livros,livro,books html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/estilo.css">


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<!-- <div id="preloder">
		<div class="loader"></div>
	</div> -->

	<!-- Header section , menu principal -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a class="site-logo" href="index.php">
				<img src="img/logo.jpg" alt="">
			</a>
			<!-- <div class="user-panel">
				<a href="#">Login</a>  
			</div> -->
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<!-- site menu -->
			<nav class="main-menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="livros.php">Catalago</a></li>
					<li><a href="admin">Adm</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Latest news section -->
	<!-- <div class="latest-news-section">
		<div class="ln-title">Latest News</div>
		<div class="news-ticker">
			<div class="news-ticker-contant">
				<div class="nt-item"><span class="new">new</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
				<div class="nt-item"><span class="strategy">strategy</span>Isum dolor sit amet, consectetur adipiscing elit. </div>
				<div class="nt-item"><span class="racing">racing</span>Isum dolor sit amet, consectetur adipiscing elit. </div>
			</div>
		</div>
	</div> -->
	<!-- Latest news section end -->


	<!-- Page info section -->
	<!-- <section class="page-info-section set-bg" data-setbg="img/page-top-bg/3.jpg">
		<div class="pi-content">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-6 text-white">
						<h2>Game reviews</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum.</p>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- Page info section -->


	<!-- Page section -->
	<section class="page-section review-page spad">
		<div class="container">
			
            <?php if($quantidade > 0){?>
                <div class="row g-5">
                <div class="col-md-12">
                <h2 class="h4 text-black"> <?php echo $linha['titulo']?></h2>
                <h3 class="h5 mb-5">
                <?php 
                $data = date_create($linha['data']);
                echo date_format($data, 'd/m/Y');
                ?>
                </h3>
                <?php if($linha['imagem'] != ''){?>  <!-- if para evitar que apareça o icone de imagem quebrada -->
                    <img src="img/<?php echo $linha['imagem']?>" alt="<?php echo $linha['imagem']?>" class="img-fluid">
                    <?php }?>
                <p class="text-dark"> Resumo: <?php echo $linha['texto']?></p>
                <p class="text-dark">Editora: <?php echo $linha['editora']?></p>
                <p class="text-dark">Autor: <?php echo $linha['autor']?></p>
                <p class="text-dark"> Paginas: <?php echo $linha['pagina']?></p>
                <p class="text-dark">Preço: <?php echo $linha['preco']?></p>
                    <a href="javascript:history.back();" class="btn btn-warning">Voltar</a>
                </div>
        </div>
            <?php }?>

     <!-- início quantidade menor que zero -->
     <?php if($quantidade <= 0){?>
    <div class="row g-5">
      <div class="col-md-12">
       <h2 class="h4">Não existe nenhum livro selecionada para ser exibida!</h2>
      </div>
    </div>
    <?php }?>
    <!-- final quantidade menor que zero -->

    <!-- inicio insere comentarios  -->
    <div class="row g-5 mt-5">
      <h2 class="h4"> Deixe o seu Comentarios:</h2>
      <div class="col-md-12">
       <iframe src="insere.php?id_livro=<?php echo $_GET['id_livro']?>" class="container-fluid"  FRAMEBORDER="0" height="350px"></iframe>
      </div>
    </div>
    <!-- final insere comentarios  -->

    <hr class="my-3">

    <!-- inicio exibe comentarios  -->
    <?php if($linhacomentario > 0) { ?>
    <div class="row g-5">
    <h2 class="h4">Comentarios Enviados:</h2>
            <?php do{?>
            <div class="container">
            <p>
              <a href="malito: "> <?php echo $linhacomentario['email']?> -
              </a>
              <?php echo $linhacomentario['nome']?>
              disse em :
              <?php $datacomentario = date_create($linhacomentario['data']); echo date_format($datacomentario,'d/m/Y')?>
            </p>
            <p> <?php echo $linhacomentario['comentario']?> </p>
            </div>
            <?php }while($linhacomentario = mysqli_fetch_assoc($resultadocomentario))?>
          </div>
      <?php } else{?>
        <div class="row g-5">
          <h2 class="h4">Comentarios Enviados:</h2>
            <div class="container ">
            <p>nenhum comentario nessa noticia</p>
            <p>seja o primeiro a comentar</p>
            </div>
          </div>

       <?php }?>

    <!-- final exibe comentarios  -->

			<!-- <div class="text-center pt-4">
				<button class="site-btn btn-sm">Load More</button>
			</div> -->
		</div>
	</section>
	<!-- Page section end -->


	<!-- Review section -->
	<!-- <section class="review-section review-dark spad set-bg" data-setbg="img/review-bg-2.jpg"> -->
		<!-- <div class="container"> -->
			<!-- <div class="section-title text-white">
				<div class="cata new">new</div>
				<h2>Recent Reviews</h2>
			</div> -->
			<!-- <div class="row text-white"> -->
				<!-- <div class="col-lg-3 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="img/review/1.jpg">
							<div class="score yellow">9.3</div>
						</div>
						<div class="review-text">
							<h5>Assasin’’s Creed</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit ame.</p>
						</div>
					</div>
				</div> -->
				<!-- <div class="col-lg-3 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="img/review/2.jpg">
							<div class="score purple">9.5</div>
						</div>
						<div class="review-text">
							<h5>Doom</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit ame.</p>
						</div>
					</div>
				</div> -->
				<!-- <div class="col-lg-3 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="img/review/3.jpg">
							<div class="score green">9.1</div>
						</div>
						<div class="review-text">
							<h5>Overwatch</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit ame.</p>
						</div>
					</div>
				</div> -->
				<!-- <div class="col-lg-3 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="img/review/4.jpg">
							<div class="score pink">9.7</div>
						</div>
						<div class="review-text">
							<h5>GTA</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit ame.</p>
						</div>
					</div>
				</div> -->
			<!-- </div> -->
		<!-- </div> -->
	<!-- </section> -->
	<!-- Review section end -->


	<!-- Footer top section -->
	<!-- <section class="footer-top-section"> -->
		<!-- <div class="container">
			<div class="footer-top-bg">
				<img src="img/footer-top-bg.png" alt="">
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="footer-logo text-white">
						<img src="img/footer-logo.png" alt="">
						<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit ame.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="footer-widget mb-5 mb-md-0">
						<h4 class="fw-title">Latest Posts</h4>
						<div class="latest-blog">
							<div class="lb-item">
								<div class="lb-thumb set-bg" data-setbg="img/latest-blog/1.jpg"></div>
								<div class="lb-content">
									<div class="lb-date">June 21, 2018</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum </p>
									<a href="#" class="lb-author">By Admin</a>
								</div>
							</div>
							<div class="lb-item">
								<div class="lb-thumb set-bg" data-setbg="img/latest-blog/2.jpg"></div>
								<div class="lb-content">
									<div class="lb-date">June 21, 2018</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum </p>
									<a href="#" class="lb-author">By Admin</a>
								</div>
							</div>
							<div class="lb-item">
								<div class="lb-thumb set-bg" data-setbg="img/latest-blog/3.jpg"></div>
								<div class="lb-content">
									<div class="lb-date">June 21, 2018</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum </p>
									<a href="#" class="lb-author">By Admin</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="footer-widget">
						<h4 class="fw-title">Top Comments</h4>
						<div class="top-comment">
							<div class="tc-item">
								<div class="tc-thumb set-bg" data-setbg="img/authors/1.jpg"></div>
								<div class="tc-content">
									<p><a href="#">James Smith</a> <span>on</span>  Lorem ipsum dolor sit amet, co</p>
									<div class="tc-date">June 21, 2018</div>
								</div>
							</div>
							<div class="tc-item">
								<div class="tc-thumb set-bg" data-setbg="img/authors/2.jpg"></div>
								<div class="tc-content">
									<p><a href="#">James Smith</a> <span>on</span>  Lorem ipsum dolor sit amet, co</p>
									<div class="tc-date">June 21, 2018</div>
								</div>
							</div>
							<div class="tc-item">
								<div class="tc-thumb set-bg" data-setbg="img/authors/3.jpg"></div>
								<div class="tc-content">
									<p><a href="#">James Smith</a> <span>on</span>  Lorem ipsum dolor sit amet, co</p>
									<div class="tc-date">June 21, 2018</div>
								</div>
							</div>
							<div class="tc-item">
								<div class="tc-thumb set-bg" data-setbg="img/authors/4.jpg"></div>
								<div class="tc-content">
									<p><a href="#">James Smith</a> <span>on</span>  Lorem ipsum dolor sit amet, co</p>
									<div class="tc-date">June 21, 2018</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	<!-- </section> -->
	<!-- Footer top section end -->

	
	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<!-- <ul class="footer-menu">
				<li><a href="index.html">Home</a></li>
				<li><a href="review.html">Games</a></li>
				<li><a href="categories.html">Blog</a></li>
				<li><a href="community.html">Forums</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul> -->
			<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;  <!-- script que retorna o ano <script>document.write(new Date().getFullYear());</script> -->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
		</div>
	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.marquee.min.js"></script>
	<script src="js/main.js"></script>
    </body>
</html>

<!-- <div class="rating"> - classe responsavel por trazer imagem de estrelas 
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star is-fade"></i>
</div> -->