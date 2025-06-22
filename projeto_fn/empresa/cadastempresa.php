<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro da empresa</title>
    <!-- css do bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
  rel="stylesheet"/>
  

<link rel="stylesheet" type="text/css" href="../css/cadastempresa2.css">
    
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
          <a class="navbar-brand" href="../index.php"><img class="logo" src="../img/logo.jpeg"></a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav  mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="../index.php"><span class="txtnav">Inicio</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../eventos.php"><span class="txtnav">Eventos</span></a>
              </li>
              
              
             
            </div>
            </ul>
            <a class="nav-link" href="../login.php">
                  <button class="bt btn-outline-warning" >Login</button>
            </a>
          </div>
        </div>
      </nav>
      <Div class="container" style="margin: auto; margin-top:1%; display:flex; justify-content:center;">
         
      <div class="card text-center" >
        <div class="card-header"> <h2>Realize seu cadastro</h2>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="buttonlogin" href="../cadastro.php">
                    <button type="submit" class="btn btn-warning">Usuário</button>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="buttonlogin" href="empresa/cadastempresa.php">
                    <button class=" btn btn-warning" href=>Empresa</button>
                   </a>
              </ul>
        </div>
        <div class="card-body">
        <form method="post" action="salvar_empresa.php" enctype="multipart/form-data" class="needs-validation" onsubmit="return validateForm()">
  <!-- seu formulário aqui -->

                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                  <div class="col">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" name="razao_social" class="form-control" required>
                      <label  class="form-label" for="form3Example1">Razão social</label>
                    </div>
                  </div>
                  <div class="col">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" name="nome_fantasia" class="form-control" required>
                      <label class="form-label" for="form3Example2">Nome fantasia</label>
                    </div>
                  </div>
                </div>
                <!-- CPF input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="cnpj" class="form-control" required>
                    <label class="form-label" for="form3Example3">CNPJ</label>
                  </div>
                
              <!-- Telefone input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="telefone_empresa" class="form-control" required>
                <label class="form-label" for="form3Example3">Telefone </label>
              </div>
          
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" name="email_empresa"  class="form-control" required>
                  <label class="form-label" for="form3Example3">Email </label>
                </div>
              <!-- Password input -->
                 <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" name="senha_empresa" id="senha_empresa"  class="form-control" required>
                  <label class="form-label" for="form3Example4">Senha</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                  <input required type="password" name="confirmesenha" id="confirmesenha" class="form-control" >
                  <label class="form-label" for="form3Example4" >Confirme sua senha</label>
                </div>
                <div class="row mb-4">
                  <div class="col-2">
                    <input type="text" data-mask="00000-000" class="form-control" placeholder="CEP" name="cep" id="cep" required>
                    <div class="invalid-feedback">CEP Inválido</div>
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" placeholder="Endereço" name="endereco" maxlength="50" id="endereco" required>
                    <div class="invalid-feedback">Endereço Inválido</div>
                  </div>
                  <div class="col-2">
                    <input type="text" class="form-control" placeholder="Número" name="numero_end" id="numero" required>
                    <div class="invalid-feedback">Número Inválido</div>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-4">
                    <input type="text" class="form-control" placeholder="Bairro" name="bairro" id="bairro" required>
                    <div class="invalid-feedback">Bairro Inválido</div>
                  </div>
                  <div class="col-4">
                    <input type="text" class="form-control" placeholder="Cidade" name="cidade" id="cidade" required>
                    <div class="invalid-feedback">Cidade Inválida</div>
                  </div>
                  <div class="col-4">
                  <select class="form-select" aria-label="Selecione um estado" name="uf" id="uf" required>
                        <option value="" disabled selected>UF</option>
                      <option value="AC">Acre</option>
                      <option value="AL">Alagoas</option>
                      <option value="AP">Amapá</option>
                      <option value="AM">Amazonas</option>
                      <option value="BA">Bahia</option>
                      <option value="CE">Ceará</option>
                      <option value="DF">Distrito Federal</option>
                      <option value="ES">Espírito Santo</option>
                      <option value="GO">Goiás</option>
                      <option value="MA">Maranhão</option>
                      <option value="MT">Mato Grosso</option>
                      <option value="MS">Mato Grosso do Sul</option>
                      <option value="MG">Minas Gerais</option>
                      <option value="PA">Pará</option>
                      <option value="PB">Paraíba</option>
                      <option value="PR">Paraná</option>
                      <option value="PE">Pernambuco</option>
                      <option value="PI">Piauí</option>
                      <option value="RJ">Rio de Janeiro</option>
                      <option value="RN">Rio Grande do Norte</option>
                      <option value="RS">Rio Grande do Sul</option>
                      <option value="RO">Rondônia</option>
                      <option value="RR">Roraima</option>
                      <option value="SC">Santa Catarina</option>
                      <option value="SP">São Paulo</option>
                      <option value="SE">Sergipe</option>
                      <option value="TO">Tocantins</option>
                    </select>
                </div>
                <div class="row g-0 text-center" style="margin-top: 5%; margin-bottom: 5%;justify-content: space-around;">
                <div class="col-sm-3 col-md-4">
                   <img id="preview_foto1" src="../img/usuário.jpg" alt="..." class="rounded w-100 mb-3 border" style="height:250px; object-fit: cover;">
                <div class="d-flex justify-content-center">
                  <label for="foto1_emp" class="btn btn-light mb-2">Carregar Imagem</label>
                  <input type="file" id="foto1_emp" name="foto1_emp" accept="image/*" class="custom-file-input" style="display: none" onchange="previewImage(event, 'preview_foto1')"   >
                </div>
                </div>
                <div class="col-3 col-md-4">
                  <img id="preview_foto2" src="../img/usuário.jpg" alt="..." class="rounded w-100 mb-3 border" style="height:250px; object-fit: cover;">
                <div class="d-flex justify-content-center">
                  <label for="foto2_emp" class="btn btn-light mb-2">Carregar Imagem</label>
                  <input type="file" id="foto2_emp" name="foto2_emp" accept="image/*" class="custom-file-input" style="display: none" onchange="previewImage(event, 'preview_foto2')">
                </div>
                </div>
                <div class="col-3 col-md-4">
                 <img id="preview_foto3" src="../img/usuário.jpg" alt="..." class="rounded w-100 mb-3 border" style="height:250px; object-fit: cover;">
                <div class="d-flex justify-content-center">
                  <label for="foto3_emp" class="btn btn-light mb-2">Carregar Imagem</label>
                  <input type="file" id="foto3_emp" name="foto3_emp" accept="image/*" class="custom-file-input" style="display: none" onchange="previewImage(event, 'preview_foto3')">
                </div>
                </div>
              </div>
              <div class="modalidades">
                    <div class="row mb-6">
                      <div class="col-4 checkbox-container">
                          <label class="switch">
                            <input type="checkbox" name="modalidades[]" value="futebol">
                            <span class="slider round"></span>
                          </label>
                          <label class="check-label" for="switchCheckDefault">Futebol</label>
                          <!-- Aqui os inputs serão inseridos dinamicamente -->
                        </div>


                      <div class="col-4 checkbox-container">
                        <label class="switch">
                          <input type="checkbox" name="modalidades[]" value="futsal">
                          <span class="slider round"></span>
                        </label>
                        <label class="check-label" for="switchCheckDefault">Futsal</label>
                      </div>

                      <div class="col-3 checkbox-container">
                        <label class="switch">
                          <input type="checkbox" name="modalidades[]" value="society">
                          <span class="slider round"></span>
                        </label>
                        <label class="check-label" for="switchCheckDefault">Society</label>
                      </div>
                    </div>
                    <!-- fim 1 linha -->

                    <!-- 2 linha -->
                    <div class="row mb-6">
                      <div class="col-4 checkbox-container">
                        <label class="switch">
                          <input type="checkbox" name="modalidades[]" value="futvolei">
                          <span class="slider round"></span>
                        </label>
                        <label class="check-label" for="switchCheckDefault">Futvôlei</label>
                      </div>

                      <div class="col-4 checkbox-container">
                        <label class="switch">
                          <input type="checkbox" name="modalidades[]" value="basquete">
                          <span class="slider round"></span>
                        </label>
                        <label class="check-label" for="switchCheckDefault">Basquete</label>
                      </div>

                      <div class="col-3 checkbox-container">
                        <label class="switch">
                          <input type="checkbox" name="modalidades[]" value="natacao">
                          <span class="slider round"></span>
                        </label>
                        <label class="check-label" for="switchCheckDefault">Natação</label>
                      </div>
                    </div>
                    <!-- fim 2 linha -->
                     <div class="row mb-6">
                      <div class="col-4 checkbox-container">
                        <label class="switch">
                          <input type="checkbox" name="modalidades[]" value="tenis_mesa">
                          <span class="slider round"></span>
                        </label>
                        <label class="check-label" for="switchCheckDefault">Tenis de mesa</label>
                      </div>

                      <div class="col-4 checkbox-container">
                        <label class="switch">
                          <input type="checkbox" name="modalidades[]" value="volei_quadra">
                          <span class="slider round"></span>
                        </label>
                        <label class="check-label" for="switchCheckDefault">Volei de quadra</label>
                      </div>

                      <div class="col-3 checkbox-container">
                        <label class="switch">
                          <input type="checkbox" name="modalidades[]" value="volei_praia">
                          <span class="slider round"></span>
                        </label>
                        <label class="check-label" for="switchCheckDefault">Volei de praia</label>
                      </div>
                    </div>

                    <!-- 3 linha -->
                   <div class="row">
                    <h2>Selecione os dias de funcionamento e seus horários</h2>
                     <?php
                      $diasSemana = ['Segunda' => 'Segunda-feira', 'Terça' => 'Terça-feira', 'Quarta' => 'Quarta-feira', 'Quinta' => 'Quinta-feira', 'Sexta' => 'Sexta-feira', 'Sabado' => 'Sábado', 'Domingo' => 'Domingo'];
                      foreach ($diasSemana as $valor => $label):
                      ?>
                        <div class="col-4 mb-3">
                          <!-- Checkbox do dia -->
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="dia_<?= $valor ?>" name="dias_semana[]" value="<?= $valor ?>" onchange="mostrarHorarios('<?= $valor ?>')">
                            <label class="form-check-label" for="dia_<?= $valor ?>">
                              <?= $label ?>
                            </label>
                          </div>

                          <!-- Campos de horário, inicialmente escondidos -->
                          <div class="horario-campos mt-2" id="horario_<?= $valor ?>" style="display: none;">
                            <label for="inicio_<?= $valor ?>">Início:</label>
                            <input type="time" class="form-control mb-2" name="horario_inicio[<?= $valor ?>]" id="inicio_<?= $valor ?>">

                            <label for="fim_<?= $valor ?>">Fim:</label>
                            <input type="time" class="form-control" name="horario_fim[<?= $valor ?>]" id="fim_<?= $valor ?>">
                          </div>
                        </div>
                      <?php endforeach; ?>  

                    <!-- fim 3 linha -->
                  </div> <!-- fechamento da div modalidades -->

    </div>
                    <div class="form-floating">
                      <textarea class="form-control" placeholder="Leave a comment here" name="descricao" id="descricao" style="height: 100px"></textarea>
                      <label for="descricao">descreva sua empresa  </label>
                      <div id="mensagemErro" style="margin: top 2%; padding:10px; border-radius:4px; font-weight:bold; text-align:center; width:18rem;"></div>
                    <div class="col text-center ">
                  <a class="btn btn-warning" role="button" href="index.php">Voltar</a>
                  <button type="submit" class="btn btn-warning">Enviar</button>
                </div>
                    </div>
                    
             <!--fim 3 linha-->
              

         
                
                
              </div>
            </div>
        
                
                <!-- pagina 2 -->

                  
                </form>
          
        </div>
        <div class="card-footer text-muted"></div>
      

      </Div>
    
    
    <!-- Footer -->
    <div class="footer">                     
        <footer class="footer text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
              
              <a class="site" href="../index.php"> Sportmaps</a>
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
<script type="text/javascript" src="../js/validform_empresa.js"></script>
<script>
function mostrarHorarios(dia) {
  const checkbox = document.getElementById('dia_' + dia);
  const campos = document.getElementById('horario_' + dia);

  if (checkbox.checked) {
    campos.style.display = 'block';
  } else {
    campos.style.display = 'none';
    // Limpa os campos se desmarcar
    campos.querySelectorAll('input').forEach(function(input) {
      input.value = '';
    });
  }
}
</script>
<script>
  // Valores padrão para cada modalidade
  const valoresPadrao = {
    futebol: { min: 5, max: 11 },
    futsal: { min: 4, max: 7 },
    society: { min: 6, max: 11 },
    futvolei: { min: 2, max: 5 },
    basquete: { min: 5, max: 10 },
    natacao: { min: 2, max: 10 },
    tenis_mesa: { min: 1, max: 2 },
    volei_quadra: { min: 6, max: 12 },
    volei_praia: { min: 2, max: 4 }
  };

  document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('.modalidades input[type="checkbox"]');

    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        const container = this.closest('.checkbox-container');

        if (this.checked) {
          const valor = this.value;
          const padrao = valoresPadrao[valor] || { min: '', max: '' };

          // Cria os dois inputs já com valores padrão
          const input1 = document.createElement('input');
          input1.type = 'text';
          input1.name = `${valor}_input1`;
          input1.placeholder = 'Quant mínima de jogadores';
          input1.value = padrao.min;

          const input2 = document.createElement('input');
          input2.type = 'text';
          input2.name = `${valor}_input2`;
          input2.placeholder = 'Quant máxima de jogadores';
          input2.value = padrao.max;

          const inputWrapper = document.createElement('div');
          inputWrapper.classList.add('extra-inputs');
          inputWrapper.appendChild(input1);
          inputWrapper.appendChild(input2);

          container.appendChild(inputWrapper);
        } else {
          const existingInputs = container.querySelector('.extra-inputs');
          if (existingInputs) {
            existingInputs.remove();
          }
        }
      });
    });
  });
</script>
<script>
  document.getElementById('cep').addEventListener('blur', function () {
    const cep = this.value.replace(/\D/g, '');

    if (cep.length !== 8) {
      alert("CEP inválido. Digite 8 números.");
      return;
    }

    fetch(`https://viacep.com.br/ws/${cep}/json/`)
      .then(response => response.json())
      .then(data => {
        if (data.erro) {
          alert("CEP não encontrado.");
          return;
        }

        document.getElementById('endereco').value = data.logradouro || '';
        document.getElementById('bairro').value = data.bairro || '';
        document.getElementById('cidade').value = data.localidade || '';
        document.getElementById('uf').value = data.uf || '';
      })
      .catch(error => {
        console.error("Erro ao buscar o CEP:", error);
        alert("Erro ao buscar o CEP. Tente novamente.");
      });
  });
</script>
  </body>
  <div id="customAlert" style="
    display: none;
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #ffc929;
    color: white;
    font-weight: bold;
    padding: 15px 20px;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    z-index: 9999;
    text-align: center;
">
  <span id="alertMessage"></span>
</div>

  
</html> 