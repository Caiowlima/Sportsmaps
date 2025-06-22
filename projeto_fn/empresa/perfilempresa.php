<?php
include_once('../php_config/conexao.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID da empresa não fornecido.");
}

$empresa_id = (int) $_GET['id'];

// Buscar dados da empresa
$queryEmpresa = "SELECT * FROM tab_empresa WHERE id_empresa = ?";
$stmtEmpresa = $pdo->prepare($queryEmpresa);
$stmtEmpresa->execute([$empresa_id]);
$empresa = $stmtEmpresa->fetch(PDO::FETCH_ASSOC);

if (!$empresa) {
    die("Empresa não encontrada.");
}

// Buscar modalidades
$queryModalidades = "SELECT * FROM tab_mod_empresa WHERE id_empresa = ?";
$stmtModal = $pdo->prepare($queryModalidades);
$stmtModal->execute([$empresa_id]);
$modalidades = $stmtModal->fetchAll(PDO::FETCH_ASSOC);

// Buscar dias e horários direto da tab_data_hora
$queryDias = "SELECT id_data_hora, dia_semana, horario_inicio, horario_fim
              FROM tab_data_hora
              WHERE id_empresa = ?";
$stmtDias = $pdo->prepare($queryDias);
$stmtDias->execute([$empresa_id]);
$dias = $stmtDias->fetchAll(PDO::FETCH_ASSOC);

// Buscar dias da semana distintos da empresa para usar nos selects
$queryDiasSemana = "SELECT DISTINCT dia_semana FROM tab_data_hora WHERE id_empresa = ? ORDER BY FIELD(dia_semana, 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo')";
$stmtDiasSemana = $pdo->prepare($queryDiasSemana);
$stmtDiasSemana->execute([$empresa_id]);
$diasSemana = $stmtDiasSemana->fetchAll(PDO::FETCH_COLUMN);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil da empresa</title>
    <!-- css do bootstrap-->
    
     <link rel="icon" href="../img/logo.jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link para minha fonte de estilo-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--Link para colocar icone na aba da página-->
  
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

<link rel="stylesheet" type="text/css" href="../css/perfilempresa.css">
</head>
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
      <a class="navbar-brand" href="../index.php"><img class="logo" src="../img/logo.jpeg"></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">
            <span class="txtnav">Inicio</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../eventos.php">
            <span class="txtnav">Eventos</span>
          </a>
        </li>

        <?php if (isset($_SESSION['id_usuario'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="../usuario/perfilusuario.php">
            <span class="txtnav">Meu Perfil</span>
          </a>
        </li>
        <?php endif; ?>

      </ul>

      <!-- Verifica se o usuário está logado -->
      <?php if (isset($_SESSION['usuario_nome'])): ?>
        <span class="txtnav" id="user-name">
          Bem-vindo, <?= htmlspecialchars($_SESSION['usuario_nome']) ?>!
        </span>
        <a href="logout.php" class="bt btn-outline-warning" style="margin:5px;">
          Sair
        </a>
      <?php else: ?>
        <a class="nav-link" href="../login.php">
          <button class="bt btn-outline-warning" id="login-btn">Login</button>
        </a>
      <?php endif; ?>
    </div>
  </div>
</nav>
        <div class="row text-start">
          <div class="col-3 ">
           <img  class="fotoperfil" style="height: auto;" src="img/uploads/<?php echo htmlspecialchars($empresa['foto2_emp'] ?? 'default.jpg'); ?>" alt="Foto da Empresa" class="empresa-foto">
          </div>
            <div class="col-4">
              <div class="card" style="height: auto;"  >
          <div class="card-body" >
            <div class="row"  id="row-card" >
              <div class="col" >
                
                 <?php
                    function mascararCEP($cep) {
                        return preg_replace('/^(\d{5})(\d{3})$/', '$1-$2', $cep);
                    }

                    function mascararTelefone($tel) {
                        $tel = preg_replace('/\D/', '', $tel); // remove não dígitos

                        if (strlen($tel) == 11) {
                            return preg_replace('/^(\d{2})(\d{5})(\d{4})$/', '($1) $2-$3', $tel);
                        } elseif (strlen($tel) == 10) {
                            return preg_replace('/^(\d{2})(\d{4})(\d{4})$/', '($1) $2-$3', $tel);
                        }

                        return $tel; // retorna como veio se diferente
                    }
                ?>
                <h2 class="card-title"><?php echo htmlspecialchars($empresa['nome_fantasia']); ?></h2>

                 <p><strong>Endereço:</strong> <?php echo htmlspecialchars($empresa['end_empresa']); ?>, Nº <?php echo htmlspecialchars($empresa['numero_end_empresa']); ?></p>
                  <p><strong>Bairro:</strong> <?php echo htmlspecialchars($empresa['bairro_empresa']); ?></p>
                  <p><strong>Cidade:</strong> <?php echo htmlspecialchars($empresa['cidade_empresa']); ?> - <?php echo htmlspecialchars($empresa['estado_empresa']); ?></p>
                  <p><strong>CEP:</strong> <?php echo mascararCEP($empresa['cep_empresa']); ?></p>
                  <p><strong>Complemento:</strong> <?php echo htmlspecialchars($empresa['complemento_emp'] ?? 'Não informado'); ?></p>
                  <p><strong>Telefone:</strong> <?php echo mascararTelefone($empresa['tel_empresa']); ?></p>
                  <p><strong>Email:</strong> <?php echo htmlspecialchars($empresa['email_empresa']); ?></p>

              </div>
              <div class="col">
                     <div class="dias">
                        <h5>Dias e Horários de Funcionamento</h5>
                        <?php if ($dias): ?>
                            <ul>
                            <?php foreach ($dias as $dia): ?>
                                <li>
                                    <strong><?= htmlspecialchars($dia['dia_semana']) ?></strong>:
                                    <?= htmlspecialchars($dia['horario_inicio']) ?? '—' ?> às <?= htmlspecialchars($dia['horario_fim']) ?? '—' ?>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>Não há informações de dias e horários.</p>
                        <?php endif; ?>
                    </div>
                    </div>
                  </div>
              </div>
             </div>
            </div>
          </div>
           <!-- Cards das Modalidades -->
           <?php
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
          <div class="row">
  <?php foreach ($modalidades as $modalidade): ?>
    <div class="col-md-3 mb-3">
      <div class="card" id="card-mod" style="width: fit-content;height:fit-content;" >
        <div class="card-body">
          <form method="post" action="../php_config/reserva.php">
            <h5 class="card-header">
              <?php 
                $modalidadeKey = $modalidade['modalidade'];
                echo isset($nomesModalidades[$modalidadeKey]) ? $nomesModalidades[$modalidadeKey] : htmlspecialchars(ucfirst($modalidadeKey));
              ?>
            </h5>

            <p><strong>Qtd. Mínima:</strong> <?php echo htmlspecialchars($modalidade['quantidade_minima']); ?></p>
            <p><strong>Qtd. Máxima:</strong> <?php echo htmlspecialchars($modalidade['quantidade_maxima']); ?></p>

            <input type="hidden" name="id_mod_empresa" value="<?= htmlspecialchars($modalidade['id_mod_empresa']) ?>">

            <div class="row mb-3" style="justify-content: space-around;">
              <div class="col-12 mb-2">
                <label for="id_data_hora_<?= $modalidade['id_mod_empresa'] ?>">Selecione dia e horário disponíveis</label>
                <select name="id_data_hora" id="id_data_hora_<?= $modalidade['id_mod_empresa'] ?>" class="form-select" required>
                  <option value="">Selecione um dia e horário</option>
                  <?php foreach ($dias as $dia): ?>
                    <?php 
                      $label = htmlspecialchars($dia['dia_semana']) . " - " . htmlspecialchars($dia['horario_inicio']) . " às " . htmlspecialchars($dia['horario_fim']);
                    ?>
                    <option value="<?= htmlspecialchars($dia['id_data_hora']) ?>"><?= $label ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-6">
                <label for="horario_inicio_<?= $modalidade['id_mod_empresa'] ?>">Horário da reserva (Início):</label>
                <input type="time" id="horario_inicio_<?= $modalidade['id_mod_empresa'] ?>" name="horario_inicio_reserva" required>
              </div>
              <div class="col-6">
                <label for="horario_fim_<?= $modalidade['id_mod_empresa'] ?>">Horário da reserva (Fim):</label>
                <input type="time" id="horario_fim_<?= $modalidade['id_mod_empresa'] ?>" name="horario_fim_reserva" required>
              </div>
            </div>

            <button type="submit" class="btn btn-warning" name="finalizar_reserva">Finalize sua reserva</button>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<!-- Footer -->
 <div class="footer">
<footer class=" footer text-center text-lg-start  ">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Encontre nossas redes sociais:</span>
    </div>
    <!-- Footer-->
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 ">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 ">
        <i class="fab fa-instagram"></i>
      </a>

    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <img  class="fotoperfil"src="img/uploads/<?php echo htmlspecialchars($empresa['foto1_emp'] ?? 'default.jpg'); ?>" alt="Foto da Empresa" class="empresa-foto">
        </div>
        

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
          <p><i class="fas fa-home me-3"></i> <?php echo htmlspecialchars($empresa['end_empresa']); ?>, Nº <?php echo htmlspecialchars($empresa['numero_end_empresa']); ?></p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            <?php echo htmlspecialchars($empresa['email_empresa']);?>
          </p>
          <!-- Para mudar o icon pelo google utiliza fonts.google desde que vc tenha linkado a pagina
          como o md boostrap-->
          <p><i class="fas fa-phone me-3"></i><?php echo mascararTelefone($empresa['tel_empresa']); ?></p>
          
          <p><span class="material-symbols-outlined">
              location_on
              </span> <?php echo mascararCEP($empresa['cep_empresa']); ?></p>
        </div>
        <?php
          $endereco = htmlspecialchars($empresa['end_empresa']);
          $numero = htmlspecialchars($empresa['numero_end_empresa']);
          $enderecoCompleto = urlencode("$endereco, Nº $numero");
        ?>
        <iframe
          width="100%"
          height="400"
          frameborder="0"
          style="border:0"
          src="https://www.google.com/maps?q=<?php echo $enderecoCompleto; ?>&output=embed"
          allowfullscreen>
        </iframe>

        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" >
    <a class="text-reset fw-bold" href="../index.php"> SportsMaps</a>
  </div>
  <!-- Copyright -->
</footer> 
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
