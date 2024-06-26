
<!DOCTYPE html>
<?php
  $erro = filter_input(INPUT_GET,"erro");
  if($erro == "login"){
    echo '<script>alert("Usuário ou senha não indentificados")</script>';
  }
?>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AtletaShop</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../estilo/styles.css">
  <link rel="stylesheet" href="../estilo/login.css">
  <link rel="stylesheet" href="../estilo/home.css">
  <!-- JavaScript -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="../telas/index.php" ><img style="width:70px" src="../imagens/LogoAtletaShop.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../telas/chuteira.php">Chuteiras</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../telas/bolas.php">Bolas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../telas/camisas.php">Camisas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../telas/conjuntos.php">Conjunto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../telas/acessorios.php">Acessórios</a>
      </li>
    </ul> 
  </div>
  <?php
  session_start();
  if(!empty($_SESSION["usuario"])){
    echo'<a class="navbar-carrinho" href="carrinho.php" id="btn-carrinho"><img class="d-inline-block align-top" width="30" height="30" src="../imagens/carrinho.png" alt="carrinho"></a>';
  }else{
    echo '<a class="navbar-carrinho" href="#" id="btnloginCarrinho"><img class="d-inline-block align-top" id="alert-icon" width="30" height="30" src="../imagens/carrinho.png" alt="carrinho"></a>'; 
  }
    ?>
    <form class="form-inline my-2 my-lg-0 navbar-form" method="post" action="../funcoes/pesquisar.php">
      <input class="form-control mr-sm-2" type="search" name="pesquisa" placeholder="Pesquisar" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="submit">Pesquisar</button>
    </form>
    <?php
      if(!empty($_SESSION["usuario"])){            
        echo '<a class="navbar-logado p-3"  id="icone-logado" href="usuario.php"><img class="d-inline-block align-top" width="30" height="30" src="../imagens/iconelogado.png" alt="perfil"></a>';
        echo '<a href="usuario.php"><h8 class="d-inline-block align-top" style="color:#fff">'.$_SESSION["usuario"].'</h8></a>'.'<a class ="nav-link" href="../funcoes/sair.php"><img class="d-inline-block align-top" width="20" height="20" src="../imagens/icon-sair.png" title="sair"></a>';
      }else{
        echo '<button id="btnlogin" class="btn btn-outline-light my-2 my-sm-0 ml-2">Login</button>'; 
      }
    ?> 
</nav>
<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" style="width:100%" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../imagens/chuteira.jpg" alt="chuteiras">
      <div class="carousel-caption d-none d-md-block">
        <a href="../telas/chuteira.php"><button class="btn btn-primary" id="btn-addcarrinho">Ver mais</button></a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../imagens/camisa.jpg" alt="camisas">
      <div class="carousel-caption d-none d-md-block">
        <a href="../telas/camisas.php"><button class="btn btn-primary" id="btn-addcarrinho">Ver mais</button></a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../imagens/conjunto.jpg" alt="cunjuntos">
      <div class="carousel-caption d-none d-md-block">
        <a href="../telas/conjuntos.php"><button class="btn btn-primary" id="btn-addcarrinho">Ver mais</button></a>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" id="btn-anterior">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" id="btn-prox">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
</div>

<!-- Login Form -->
<div class="modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="loginModalLabel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../funcoes/login.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Endereço de email:</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email">
          </div>
          <div class="form-group">
            <label>Senha:</label>
            <input type="password" class="form-control" name="pass" placeholder="Senha">
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
        <p class="mt-3">Não tem cadastro? <a href="CriarCadastro.php" >Crie sua conta</a></p>
      </div>
    </div>
  </div>
</div>

<!-- Srcript Tela Modal Login -->
 <script>
  var modal = document.getElementById("loginModal");
  var btn = document.getElementById("btnlogin");
  var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
      modal.style.display = "block";
    }

    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    document.addEventListener('DOMContentLoaded', () => {
    const alertIcon = document.getElementById('alert-icon');

    alertIcon.addEventListener('click', () => {
        alert('Para acessar está função é necessario fazer o login!');
    });
});
     </script>
</body>