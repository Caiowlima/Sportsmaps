<?php
session_start();
include_once('../php_config/conexao.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}
function calcularIdade($dataNascimento) {
    $dataNascimentoObj = new DateTime($dataNascimento);
    $hoje = new DateTime();
    $idade = $hoje->diff($dataNascimentoObj)->y;
    return $idade;
}


$id_usuario = $_SESSION['id_usuario'];

// Buscar dados do usuário
$queryUser = "SELECT * FROM tab_usuario WHERE id_usuario = ?";
$stmtUser = $pdo->prepare($queryUser);
$stmtUser->execute([$id_usuario]);
$usuario = $stmtUser->fetch(PDO::FETCH_ASSOC);

// Buscar reservas do usuário
$queryReservas = "
    SELECT r.*, m.modalidade, e.nome_fantasia, d.dia_semana, d.horario_inicio AS horario_inicio_func, d.horario_fim AS horario_fim_func
    FROM tab_reserva r
    JOIN tab_mod_empresa m ON r.id_mod_empresa = m.id_mod_empresa
    JOIN tab_empresa e ON m.id_empresa = e.id_empresa
    JOIN tab_data_hora d ON r.id_data_hora = d.id_data_hora
    WHERE r.id_usuario = ?
    ORDER BY r.id_reserva DESC
";
$stmtReservas = $pdo->prepare($queryReservas);
$stmtReservas->execute([$id_usuario]);
$reservas = $stmtReservas->fetchAll(PDO::FETCH_ASSOC);

$nomesModalidades = [
    'futebol' => 'Futebol',
    'futsal' => 'Futsal',
    'society' => 'Society',
    'futvolei' => 'Futvôlei',
    'basquete' => 'Basquete',
    'natacao' => 'Natação',
    'tenis_mesa' => 'Tênis de mesa',
    'volei_quadra' => 'Vôlei de quadra',
    'volei_praia' => 'Vôlei de praia'
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>

    <!-- css do bootstrap -->
    <link rel="icon" href="../img/logo.jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+ES+Deco:wght@100..400&family=Playwrite+US+Trad:wght@100..400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.1/mdb.min.css" rel="stylesheet">
    
    <!-- Seu CSS -->
    <link rel="stylesheet" type="text/css" href="../css/perfilusuario.css">
</head>
<body>

<!-- Navbar -->
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
      <a class="navbar-brand" href="../index.php"><img class="logo" src="../img/logo.jpeg"></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php"><span class="txtnav">Inicio</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../eventos.php"><span class="txtnav">Eventos</span></a>
        </li>
      </ul>

      <?php if (isset($_SESSION['usuario_nome'])): ?>
        <span class="txtnav" id="user-name">
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
 <div class="contanier" style="justify-content:space-around; height:min-content;">
 <div class="row text-start" >
            
            
              <div class="card"  >
          <div class="card-body" >
            <div class="row" >
                 <img class="rounded mx-auto d-block" style=" height:350px; width: 350px;"   src="<?php echo htmlspecialchars($usuario['foto_usuario'] ?? 'default.jpg'); ?>"  alt="...">
              
              </div>
                 <div class="col" style="height:auto; width:auto;">
                
                    <h2><?php echo htmlspecialchars($usuario['nome_usuario']); ?></h2>
                    <p><strong>Idade:</strong> <?php echo calcularIdade($usuario['nasc_usuario']); ?> anos</p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email_usuario']); ?></p>
                    <p><strong>Telefone:</strong> <?php echo htmlspecialchars($usuario['celular_usuario']); ?></p>
                    <p><strong>Cep:</strong> <?php echo htmlspecialchars($usuario['cep_usuario']); ?></p>  
                    <p><strong>Endereço:</strong> <?php echo htmlspecialchars($usuario['end_usuario']); ?>,N°<?php echo htmlspecialchars($usuario['end_usuario_numero']); ?></p> 
                    <p><strong>Bairro:</strong> <?php echo htmlspecialchars($usuario['bairro_usuario']); ?></p> 
                    <p><strong>Cidade:</strong> <?php echo htmlspecialchars($usuario['cidade_usuario']); ?></p> 
                    <p><strong>Estado:</strong> <?php echo htmlspecialchars($usuario['estado_usuario']); ?></p> 
              </div>
              
              </div>
              </div>
              <div class="row text-center " >
                    <h1>Agendamentos</h1>
                    <?php foreach ($reservas as $reserva): ?>
                        <div class="col-md-4 mb-4">
                        <div class="card" style=" height:auto; width:auto;">
                            <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($reserva['nome_fantasia']); ?></h5>
                            <p class="card-text">
                                <strong>Modalidade:</strong> <?= htmlspecialchars($nomesModalidades[$reserva['modalidade']] ?? $reserva['modalidade']); ?><br>
                                <strong>Dia reservado:</strong> <?= htmlspecialchars($reserva['dia_semana']); ?><br>
                                <strong>Período reservado:</strong> <?= htmlspecialchars(substr($reserva['horario_inicio_reserva'], 0, 5)); ?> às <?= htmlspecialchars(substr($reserva['horario_fim_reserva'], 0, 5)); ?><br>
                                <strong>Funcionamento:</strong> <?= htmlspecialchars(substr($reserva['horario_inicio_func'], 0, 5)); ?> às <?= htmlspecialchars(substr($reserva['horario_fim_func'], 0, 5)); ?><br>
                                <strong>Data da reserva:</strong> <?= date('d/m/Y', strtotime($reserva['data_criacao'])); ?>
                            </p>
                            </div>
                        </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if (empty($reservas)): ?>
                        <p class="text-muted">Você ainda não possui agendamentos.</p>
                    <?php endif; ?>
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
