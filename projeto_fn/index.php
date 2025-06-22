<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <!-- css do bootstrap-->
    
     <link rel="icon" href="img/logo.jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link para minha fonte de estilo-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--Link para colocar icone na aba da página-->
    <link rel="icon" href="img/logo.jpg">
    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playwrite+ES+Deco:wght@100..400&family=Playwrite+US+Trad:wght@100..400&display=swap" rel="stylesheet">
<!-- MDBoostrap -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.1/mdb.min.css"
  rel="stylesheet"
/>

<link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
<?php session_start(); ?>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01"
            aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.jpeg"></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">
            <span class="txtnav">Inicio</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="eventos.php">
            <span class="txtnav">Eventos</span>
          </a>
        </li>

        <?php if (isset($_SESSION['id_usuario'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="usuario/perfilusuario.php">
            <span class="txtnav">Meu Perfil</span>
          </a>
        </li>
        <?php endif; ?>

      </ul>

      <!-- Verifica se o usuário está logado -->
      <?php if (isset($_SESSION['usuario_nome'])): ?>
        <span class="navbar-text" id="user-name">
          Bem-vindo, <?= htmlspecialchars($_SESSION['usuario_nome']) ?>!
        </span>
        <a href="logout.php" class="bt btn-outline-warning" style="margin:5px;">
          Sair
        </a>
      <?php else: ?>
        <a class="nav-link" href="login.php">
          <button class="bt btn-outline-warning" id="login-btn">Login</button>
        </a>
      <?php endif; ?>
    </div>
  </div>
</nav>
      <div class="text-center mt-3">
    
    <!--botão “Conheça mais” rola suavemente até os cards-->    
  <a href="#quem-somos" class="btn btn-outline-warning rolar-suave">Conheça mais</a>
</div>

    <!--Carrosel apartir do bootstrap carroel: croosfade-->
    <div class="container-carrosel">
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/evento.jpg" class="d-block w-100" width="500px" height="500px"  alt="Logo da loja">
        </div>
        <div class="carousel-item">
          <img src="img/quadra2.jpeg" class="d-block w-100" width="500px" height="500px"  alt="Bolo de limão">
        </div>
        <div class="carousel-item">
          <img src="img/quadra8.jpeg" class="d-block w-100" width="500px" height="500px"  alt="Bolo de chocolate">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
     <!--section-cards cria um fundo com cor personalizada para destacar a seção-->
    <div id="quem-somos" class="container mt-5 mb-5 p-4 rounded section-cards">
   <div class="container mt-5 mb-5 p-4 rounded section-cards">
  <h2 class="text-center mb-4 titulo-cards">Quem somos</h2>
  <div class="row  g-4">
     <!-- Cards da Missão, Visão e Valores aqui dentro -->
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-solid fa-bullseye icon-roxo me-2"></i>Missão</h5>
          <p class="card-text text-start">
            A Sportmaps tem a missão de conectar pessoas e espaços, tornando a prática esportiva acessível, organizada e social para todos. Buscamos mapear e disponibilizar cada local com infraestrutura para esporte, permitindo que usuários agendem partidas com facilidade.
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-eye icon-roxo me-2"></i>Visão</h5>
          <p class="card-text text-start">
           Ser referência para a comunidade esportiva, reconhecida por facilitar a descoberta de locais, a organização de eventos e a formação de equipes. Almejamos construir um sistema onde o esporte seja parte integrante do dia a dia de todos, promovendo saúde e bem-estar.

          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-hand-holding-heart icon-roxo me-2"></i>Valores</h5>
          <p class="card-text text-start">
            <strong>Acessibilidade:</strong> democratizar o esporte e o acesso a todo e qualquer espaço esportivo.<br>
            <strong>Paixão:</strong> criado pra quem ama o esporte.<br>
            <strong>Inovação:</strong> utilizamos a tecnologia para fazer agendamentos descomplicados.<br>
            <strong>Transparência:</strong> clareza nas informações, seja no status de um agendamento ou no custo de uma quadra particular.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


    </div>
    <div class="container-historia">

 
      <div class="faixa">
  
      
    <!-- Footer -->
    <div class="footer">                     
        <footer class="footer text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
              
              <a class="site" href="index.php"> Sportmaps</a>
            </div>
            <!-- Copyright -->
          </footer>
        </div> 
<!-- Footer -->
<!--Vilibras-->
<!-- Para ter acessibilidae e libras com apoio do site do governo-->
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
  <!--Vilibras-->
    <!--Script sempre em cima do /body não pode ficar antes dele-->
    <!--Script do bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
 <!-- MDB -->
 <!--Links para footer do md boostrap-->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.1/mdb.umd.min.js"
></script>

  </body>
</html> 