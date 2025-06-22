// Mostrar mensagem estilizada
function mostrarMensagem(texto, isErro = true) {
  const divMsg = document.getElementById('mensagemErro');
  if (!divMsg) return;

  divMsg.style.display = 'block';
  divMsg.textContent = texto;
  divMsg.style.backgroundColor = isErro ? '#ffc929' : '#5a037a';
  divMsg.style.color = '#fff';
}

// Esconde a mensagem de feedback
function esconderMensagem() {
  const divMsg = document.getElementById('mensagemErro');
  if (divMsg) {
    divMsg.style.display = 'none';
  }
}

// Verifica se o usuário tem 18 anos ou mais
function verificarMaioridade() {
  const inputData = document.getElementById('nasc').value;
  if (!inputData) return false;

  const dataNascimento = new Date(inputData);
  const hoje = new Date();

  let idade = hoje.getFullYear() - dataNascimento.getFullYear();
  const mes = hoje.getMonth() - dataNascimento.getMonth();
  const dia = hoje.getDate() - dataNascimento.getDate();

  if (mes < 0 || (mes === 0 && dia < 0)) {
    idade--;
  }

  return idade >= 18;
}

// Verifica se as senhas são iguais
function validarSenhas() {
  if (!document.querySelector("form").checkValidity()) {
    document.querySelector('form').classList.add('was-validated');
    return false;
  }

  const senha = document.getElementById("senha").value;
  const confirmarSenha = document.getElementById("confirmarSenha").value;

  if (senha !== confirmarSenha) {
    return false;
  }

  return true;
}

// Função principal de validação do formulário
function validarForm() {
  esconderMensagem();

  if (!verificarMaioridade()) {
    mostrarMensagem('Cadastro somente para maiores de 18 anos');
    return false;
  }

  if (!validarSenhas()) {
    mostrarMensagem('As senhas não coincidem! Por favor, tente novamente');
    return false;
  }

  // HTML5 já cuida do restante
  mostrarMensagem('Formulário válido! Enviando cadastro...', false);
  return true;
}

// Função buscar CEP com mensagens no estilo
function buscarCep() {
  esconderMensagem();
  var cep = document.getElementById('cep').value.replace(/\D/g, '');

  if (cep.length !== 8) {
    mostrarMensagem('CEP inválido! Informe um CEP com 8 dígitos.');
    return;
  }

  fetch('https://viacep.com.br/ws/' + cep + '/json/')
    .then(function(response) {
      return response.json();
    })
    .then(function(data) {
      if (data.erro) {
        mostrarMensagem('CEP não encontrado.');
        return;
      }

      document.getElementById('endereco').value = data.logradouro;
      document.getElementById('bairro').value = data.bairro;
      document.getElementById('cidade').value = data.localidade;

      var ufSelect = document.getElementById('uf');
      for (var i = 0; i < ufSelect.options.length; i++) {
        if (ufSelect.options[i].value === data.uf) {
          ufSelect.selectedIndex = i;
          break;
        }
      }
    })
    .catch(function() {
      mostrarMensagem('Erro ao buscar o CEP.');
    });
}
