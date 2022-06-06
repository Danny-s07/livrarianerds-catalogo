<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/form-validation.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">

    <form class="needs-validation" method="POST" action="comentario_enviado.php" novalidate>
            <div class="row g-3">
            <div class="col-6">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="digite seu nome" required>
              <div class="invalid-feedback">
                Informe o nome.
              </div>
            </div>

            <div class="col-6">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="digite o email" required>
              <div class="invalid-feedback">
                Informe o seu email.
              </div>
            </div>


            <div class="col-12">
              <label for="comentario" class="form-label">Comentario</label>
              <textarea class="form-control" id="comentario" name="comentario" rows="2" required></textarea>
              <div class="invalid-feedback">
                Comente a notícia.
              </div>
            </div>

            <hr class="my-3">
          <input type="hidden" name="inserir" value="insere_comentario">
          <input type="hidden" name="id_livro" value="<?php echo $_GET['id_livro']?>">
          <button class="w-100 btn btn-warning btn-lg " type="submit">Inserir Comentario</button>

            </div>
        </form>

    </div>

   <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/form-validation.js"></script>

   

</body>
</html>