<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- css do bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/login.css">
     <link rel="icon" href="img/logo.jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link para minha fonte de estilo-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--Link para colocar icone na aba da página-->
    <link rel="icon" href="img/logo.jpeg">
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

<link rel="stylesheet"  href="css/login.css">

  </head>
  <body>
  <!-- navbar-expand-lg para adaptação maxima do tamanho da tela-->
    <!--bg-body-teritay é a cor de acordo com o css do bootstrap-->
    <!--Essa class abaixo é responsável para mudança no estilo e cor dos texto-->
    <nav class="navbar navbar-expand-lg" >
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.jpeg"></a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"><span class="txtnav">Inicio</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="eventos.php"><span class="txtnav">Eventos</span></a>
            </li>
            
           
          </div>
          </ul>
          
        </div>
      </div>
    </nav>
      <div class="container"  style="margin: auto; margin-top:1%; display:flex; justify-content:center; align-items:center;">
      <div class="card" style="width: 25rem;">
        <div class="card-body">
           
        <form action="php_config/controller.php" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email </label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
             
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Senha</label>
              <input type="password" class="form-control" name="senha" id="exampleInputPassword1" required>
            </div>
         
            <ul class="nav justify-content-center m-2" >
            <li class="nav-item">
              <a class="buttonlogin  " href="index.php " >
                <button type="submit" class="btn btn-warning "  >Login</button>
              </a>
            </li>
           
          </ul>
          </form>
          <ul class="nav justify-content-center m-2 ">
            
            <li class="nav-item">
              <a class="buttonlogin" href="cadastro.php">
                <button class=" btn btn-warning" href=>Cadastre-se</button>
               </a> 
         
                </div>
                
            </div>
        
          </div>
      
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