<?php
require_once('conexao/conecta.php');
//saida de dados de destaque
$sqld = "SELECT * FROM livros_tb INNER JOIN categorias_tb ON livros_tb.categoria = categorias_tb.value WHERE destaque = 'sim' ORDER BY id_livro DESC LIMIT 3";
$resultadod = mysqli_query($con,$sqld);
$linhad = mysqli_fetch_assoc($resultadod);
?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>LivrariaNerds Catalago</title>
	<meta charset="UTF-8">
	<meta name="description" content="Game Warrior Template">
	<meta name="keywords" content="warrior, game, creative, html">
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
			<div class="user-panel">
			<form class="d-flex" action="busca.php" method="GET"> 
            <input class="form-control w-100 h bg-warning text-dark border-0 " type="search" name="busca" placeholder="Busca" aria-label="Search">
            <!-- <button class="btn btn-warning" type="submit">Buscar</button> -->
    		</form>
			</div>
			<!-- <div class="user-panel">
				<a href="#">Login</a>  
			</div> -->
			<!-- responsive -->
			
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			
			<!-- site menu -->
			<nav class="main-menu my-0">
			
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="livros.php">Catalago</a></li>
					<li><a href="admin">Adm</a></li>
					
				</ul>
			
			</nav>
	</div>
		<!-- <div> -->
		<!-- <form class="d-flex" action="busca.php" method="GET"> -->
            <!-- <input class="form-control  w-25" type="search" name="busca" placeholder="Busca" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
    		</form>  --> 
				<!-- </div> -->
	</header>
	
	<!-- Header section end -->


	<!-- Hero section , sessao com banner de duas noticias - imagens inseridas na mao-->
	<!-- <section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="img/slider-1.jpg">
				<div class="hs-text">
					<div class="container">
						<h2>The Best <span>Games</span> Out There</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada <br> lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. <br>Suspendisse cursus faucibus finibus.</p>
						<a href="#" class="site-btn">Read More</a>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="img/slider-2.jpg">
				<div class="hs-text">
					<div class="container">
						<h2>The Best <span>Games</span> Out There</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada <br> lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. <br>Suspendisse cursus faucibus finibus.</p>
						<a href="#" class="site-btn">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- Hero section end -->


	<!-- Latest news section , tarja animada com as proximas noticias -->
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


	<!-- Feature section , sessao com noticias atuais um de cada categoria -destaques-->
	<section class="feature-section spad">
		<div class="container">
			<div class="row">
			<?php do{?>
				<div class="col-lg-3 col-md-6 p-0 ">
					<div class="score  testecss">9.3</div>
				<?php if($linhad['imagem'] != ''){?>  <!-- if para evitar que apareça o icone de imagem quebrada -->
          <img src="img/<?php echo $linhad['imagem']?>" alt="<?php echo $linhad['imagem']?>" class="img-fluid tamimg rounded float-start p-2">
        <?php }?>
          <h2 class="h3"><?php echo $linhad['titulo']?> - <?php echo $linhad['label'] ?></h2>
          <p class="text-dark">  <?php echo $linhad['resumo'] ?></p>
          <a href="livro.php?id_livro=<?php echo $linhad['id_livro']?>" class="btn btn-warning">Saiba Mais</a>
        </div>
        <?php }while($linhad = mysqli_fetch_assoc($resultadod));?>
				</div>
				
			</div>
		</div>
	</section>
	<!-- Feature section end -->


	<!-- Recent game section  / uma sessao toda que estava com os reviews dos games-->
	<!-- <section class="recent-game-section spad set-bg" data-setbg="img/recent-game-bg.png">
		<div class="container">
			<div class="section-title">
				<div class="cata new">new</div>
				<h2>Recent Games</h2>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="recent-game-item">
						<div class="rgi-thumb set-bg" data-setbg="img/recent-game/1.jpg">
							<div class="cata new">new</div>
						</div>
						<div class="rgi-content">
							<h5>Suspendisse ut justo tem por, rutrum</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit amet, consectetur elit. </p>
							<a href="#" class="comment">3 Comments</a>
							<div class="rgi-extra">
								<div class="rgi-star"><img src="img/icons/star.png" alt=""></div>
								<div class="rgi-heart"><img src="img/icons/heart.png" alt=""></div>
							</div>
						</div>
					</div>	
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="recent-game-item">
						<div class="rgi-thumb set-bg" data-setbg="img/recent-game/2.jpg">
							<div class="cata racing">racing</div>
						</div>
						<div class="rgi-content">
							<h5>Susce pulvinar metus nulla, vel  facilisis sem </h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit amet, consectetur elit. </p>
							<a href="#" class="comment">3 Comments</a>
							<div class="rgi-extra">
								<div class="rgi-star"><img src="img/icons/star.png" alt=""></div>
								<div class="rgi-heart"><img src="img/icons/heart.png" alt=""></div>
							</div>
						</div>
					</div>	
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="recent-game-item">
						<div class="rgi-thumb set-bg" data-setbg="img/recent-game/3.jpg">
							<div class="cata adventure">Adventure</div>
						</div>
						<div class="rgi-content">
							<h5>Suspendisse ut justo tem por, rutrum</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit amet, consectetur elit. </p>
							<a href="#" class="comment">3 Comments</a>
							<div class="rgi-extra">
								<div class="rgi-star"><img src="img/icons/star.png" alt=""></div>
								<div class="rgi-heart"><img src="img/icons/heart.png" alt=""></div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</section> -->
	<!-- Recent game section end -->


	<!-- Tournaments section -->
	<!-- <section class="tournaments-section spad">
		<div class="container">
			<div class="tournament-title">Tournaments</div>
			<div class="row">
				<div class="col-md-6">
					<div class="tournament-item mb-4 mb-lg-0">
						<div class="ti-notic">Premium Tournament</div>
						<div class="ti-content">
							<div class="ti-thumb set-bg" data-setbg="img/tournament/1.jpg"></div>
							<div class="ti-text">
								<h4>World Of WarCraft</h4>
								<ul>
									<li><span>Tournament Beggins:</span> June 20, 2018</li>
									<li><span>Tounament Ends:</span> July 01, 2018</li>
									<li><span>Participants:</span> 10 teams</li>
									<li><span>Tournament Author:</span> Admin</li>
								</ul>
								<p><span>Prizes:</span> 1st place $2000, 2nd place: $1000, 3rd place: $500</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="tournament-item">
						<div class="ti-notic">Premium Tournament</div>
						<div class="ti-content">
							<div class="ti-thumb set-bg" data-setbg="img/tournament/2.jpg"></div>
							<div class="ti-text">
								<h4>DOOM</h4>
								<ul>
									<li><span>Tournament Beggins:</span> June 20, 2018</li>
									<li><span>Tounament Ends:</span> July 01, 2018</li>
									<li><span>Participants:</span> 10 teams</li>
									<li><span>Tournament Author:</span> Admin</li>
								</ul>
								<p><span>Prizes:</span> 1st place $2000, 2nd place: $1000, 3rd place: $500</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- Tournaments section bg -->


	<!-- Review section -->
	<!-- <section class="review-section spad set-bg">  -->
		<!-- <div class="container"> -->
			<!-- <div class="section-title"> -->
				<!-- <div class="cata new">new</div> -->
				<!-- <h2>Recent Reviews</h2> -->
			<!-- </div> -->
			<!-- <div class="row"> -->
				<!-- inicio responsavel por criar cartaz e colocar infos no recent review antes do sub footer -->
				<?php //do{?>
				<!-- <div class="col-lg-3 col-md-6"> -->
				
					<!-- <div class="review-item"> -->
					<?//php if($linhac['imagem'] != ''){?>  <!-- if para evitar que apareça o icone de imagem quebrada -->
                   <!-- <img src="img/<//?php //echo $linhac['imagem']?>" alt="<//?php //echo $linhac['imagem']?>" class="img-fluid tamimg rounded float-start p-2"> -->
                   <?//php// }?>
											
						<!-- <div class="review-text"> -->
						<!-- <div class="score  testecss">9.3</div> -->
						<!-- <p><a class="h6" href="livro.php?id_livro=<//?php //echo $linhac['id_livro']?>"> <//?php// echo $linhac['titulo']?> </p></a> -->
						<!-- <div class="review-cover set-bg">responsavel pela capa do jogo // data-setbg="img/review/1.jpg" -->
						<!-- <div class="score yellow  set-bg">9.3</div> -->
						<!-- </div> -->
												
						<!-- </div> -->
					<!-- </div>
					 -->
				<!-- </div><?php //}while($linhac = mysqli_fetch_assoc($resultadoc));?> -->
				<!--  final responsavel por criar cartaz e colocar infos no recent review antes do sub footer -->				
				
			 <!-- </div> -->
		<!-- </div> -->
	</section>
	<!-- Review section end -->


	<!-- Footer top section , subrodape  com last posts e comentarios em destaques-->
	<!-- <section class="footer-top-section">
		<div class="container">
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
		</div>
	</section> -->
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