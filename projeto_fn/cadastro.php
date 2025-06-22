<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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
  

    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    

  </head>
  <body>
    <!-- Se houver erro de login, exibe a mensagem -->

  <!-- navbar-expand-lg para adaptação maxima do tamanho da tela-->
    <!--bg-body-teritay é a cor de acordo com o css do bootstrap-->
    <!--Essa class abaixo é responsável para mudança no estilo e cor dos texto-->
    <nav class="navbar navbar-expand-lg" >
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.jpeg"></a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav  mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="index.php"><span class="txtnav">Inicio</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="eventos.php"><span class="txtnav">Eventos</span></a>
              </li>
              
              
             
            </div>
            </ul>
            <a class="nav-link" href="login.php">
                  <button class="bt btn-outline-warning" >Login</button>
            </a>
          </div>
          </div>
        </div>
      </nav>

    <div class="container" style="margin: auto; margin-top:2%;" >
      <div class="card text-center">
        <div class="card-header"> <h2>Realize seu cadastro</h2></div>
        <ul class="nav justify-content-center m-2">
                <li class="nav-item">
                  <a class="buttonlogin" href="cadastro.php">
                    <button type="submit" class="btn btn-warning">Usúario</button>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="buttonlogin" href="empresa/cadastempresa.php">
                    <button class=" btn btn-warning" href=>Empresa</button>
                   </a>
              </ul>
        <div class="card-body">
      <form onsubmit="return validarForm()" method="post" action="usuario/salvar.php" enctype="multipart/form-data" class="needs-validation">

  <div class="row h-100">
    <div class="col-3">
      <img id="preview" src="img/usuário.jpg" alt="..." class="rounded w-100 mb-3 border" style="height:250px; object-fit: cover;">
      <div class="d-flex justify-content-center">
        <label for="foto" class="btn btn-light mb-2">Carregar Imagem</label>
        <input type="file" id="foto" name="foto" accept="image/*" class="custom-file-input" style="display: none" onchange="previewImage()">
      </div>
    </div>

    <div class="col-9">
      <div class="row mb-4">
    
        <div class="col-9 ">
          <input type="text" class="form-control" placeholder="Nome Completo" name="nome" maxlength="50" id="nome" required>
          <div class="invalid-feedback">Nome Inválido</div>
        </div>
        <div class="col-3">
          <input type="text" data-mask="000.000.000-00" class="form-control" placeholder="CPF" name="cpf" id="cpf"required pattern="\d{11}" title="Informe apenas números">
          <div class="invalid-feedback">CPF Inválido</div>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-4">
          <input type="text" data-mask="00.000.000" class="form-control" placeholder="RG" name="rg" id="rg" required>
          
        </div>
        <div class="col-4">
          <input type="date" class="form-control" placeholder="Data Nasc." name="nasc" maxlength="50" id="nasc" required>
          <div class="invalid-feedback">Data Inválida</div>
        </div>
        <div class="col-4">
          <input type="text" class="form-control" placeholder="Celular" name="celular" id="celular" required pattern="\d{11}"
       title="Informe apenas números, ddd + 9 digitos"  inputmode="numeric">
          <div class="invalid-feedback">Celular Inválido</div>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-12">
          <input type="email" class="form-control" placeholder="E-mail" name="email" id="email" required>
          <div class="invalid-feedback">E-mail Inválido</div>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-6">
          <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha" required>
          <div class="invalid-feedback">Senha Inválida</div>
        </div>
        <div class="col-6">
          <input type="password" class="form-control" placeholder="Confirme sua senha" name="confirmarSenha" id="confirmarSenha" required>
          <div class="invalid-feedback">Senha Inválida</div>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-12">
          <input type="text" data-mask="00000-000" class="form-control" placeholder="CEP" name="cep" onblur="buscarCep();" id="cep" required>
          <div class="invalid-feedback">CEP Inválido</div>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-8">
          <input type="text" class="form-control" placeholder="Endereço" name="endereco" maxlength="50" id="endereco" required>
          <div class="invalid-feedback">Endereço Inválido</div>
        </div>
        <div class="col-4">
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
          <div class="invalid-feedback">UF Inválido</div>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-12">
          <input type="text" class="form-control" placeholder="Apt,bloco" name="complemento" id="complemento">
          <!-- onblur removido -->
        </div>
      </div>

      <div class="col text-end">
        <a class="btn btn-warning" role="button" href="index.php">Voltar</a>
        <button type="submit" class="btn btn-warning">Enviar</button>
      </div>
    </div>
  </div>

  <div id="mensagemErro" style="display:none; padding:10px; border-radius:4px; font-weight:bold; text-align:center; width:18rem;"></div>

</form>

        </div>
        <div class="card-footer text-muted"></div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center text-lg-start">
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
         <a class="site" href="#">Sportmaps</a>
      </div>
    </footer>
    
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
  <script type="text/javascript" src="../js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="../js/atualizarFoto.js"></script>
   <script type="text/javascript" src="./js/validarForm.js"></script>
   <script type="text/javascript" src="js/previewImagem.js"></script>
  
<script>
  function buscarCep() {
    var cep = document.getElementById('cep').value.replace(/\D/g, '');

    if (cep.length !== 8) {
      alert('CEP inválido! Informe um CEP com 8 dígitos.');
      return;
    }

    fetch('https://viacep.com.br/ws/' + cep + '/json/')
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        if (data.erro) {
          alert('CEP não encontrado.');
          return;
        }

        document.getElementById('endereco').value = data.logradouro;
        document.getElementById('bairro').value = data.bairro;
        document.getElementById('cidade').value = data.localidade;

        // Seleciona o estado no select
        var ufSelect = document.getElementById('uf');
        for (var i = 0; i < ufSelect.options.length; i++) {
          if (ufSelect.options[i].value === data.uf) {
            ufSelect.selectedIndex = i;
            break;
          }
        }
      })
      .catch(function() {
        alert('Erro ao buscar o CEP.');
      });
  }
</script>





  </body>
</html>
