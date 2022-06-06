<?php
include_once('comum.php');
$tipousuario = $_SESSION['tipo'];
?>





<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>CATEGORIAS</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="admin.php">
              <span data-feather="home"></span>
              Início
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="livros.php">
              <span data-feather="file-text"></span>
              Livros
            </a>
          </li>
         <?php  if($tipousuario === 'sup') {?> <!-- fazendo uma validacao de sumir o botao do usuario , variavel tipousuario declarada como superglobal em adimin.php -->
          <li class="nav-item">
            <a class="nav-link" href="usuarios.php">
              <span data-feather="users"></span>
              Usuários
            </a>
          </li>
          <?php }?>
          <li class="nav-item">
            <a class="nav-link" href="categorias.php">
              <span data-feather="layers"></span>
              Categorias
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="upload.php">
              <span data-feather="upload"></span>
              Upload de Imagens
            </a>
          </li>
        </ul>
      </div>
    </nav> 

    