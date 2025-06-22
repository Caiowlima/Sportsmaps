<?php
include_once('php_config/conexao.php');

// Consulta empresas com suas modalidades (se quiser mais dados, ajuste os campos)
$query = "
SELECT 
    e.id_empresa, e.nome_fantasia, e.foto1_emp, quantidade_minima,quantidade_maxima,
    GROUP_CONCAT(m.modalidade SEPARATOR ', ') AS modalidades
FROM tab_empresa e
LEFT JOIN tab_mod_empresa m ON m.id_empresa = e.id_empresa
GROUP BY e.id_empresa
";

$stmt = $pdo->prepare($query);
$stmt->execute();
$empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Eventos</title>
    <link rel="icon" href="img/logo.jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" href="img/logo.jpeg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+ES+Deco:wght@100..400&family=Playwrite+US+Trad:wght@100..400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.1/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/eventos.css">
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

<div class="container mt-4">
    <div class="row">
        <?php foreach ($empresas as $empresa): ?>
            <?php
                // Modalidades da empresa
                $queryModalidades = "SELECT modalidade FROM tab_mod_empresa WHERE id_empresa = ?";
                $stmtModalidades = $pdo->prepare($queryModalidades);
                $stmtModalidades->execute([$empresa['id_empresa']]);
                $modalidades = $stmtModalidades->fetchAll(PDO::FETCH_COLUMN);
            ?>
            <div class="col-md-4 mb-4">
                <div class="card" style=" height:25rem;">
                    <img src="empresa/img/uploads/<?php echo htmlspecialchars($empresa['foto1_emp'] ?? 'default.jpg'); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($empresa['nome_fantasia']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($empresa['nome_fantasia']); ?></h5>
                        <p class="card-text">
                            <strong>Modalidades:</strong>
                            <?php 
                              if ($modalidades) {
                                  // Mapeamento manual: banco => exibição
                                  $nomesPersonalizados = [
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

                                  $modalidadesFormatadas = [];

                                  foreach ($modalidades as $modalidade) {
                                      // Caso o nome da modalidade exista no mapa de personalização
                                      if (isset($nomesPersonalizados[$modalidade])) {
                                          $modalidadesFormatadas[] = $nomesPersonalizados[$modalidade];
                                      } else {
                                          // Caso venha alguma modalidade nova que ainda não está mapeada
                                          $modalidadesFormatadas[] = ucfirst(str_replace('_', ' ', $modalidade));
                                      }
                                  }

                                  echo htmlspecialchars(implode(', ', $modalidadesFormatadas));
                              } else {
                                  echo "Nenhuma cadastrada";
                              }
                              ?>


                        </p>
                        <!-- Botão dentro do card -->
                        <a href="empresa/perfilempresa.php?id=<?php echo $empresa['id_empresa']; ?>" class="btn btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        ,
    </div>
</div>
 n
  </body>
</html>
