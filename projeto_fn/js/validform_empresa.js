function showCustomAlert(message) {
  const alertBox = document.getElementById("customAlert");
  const alertMessage = document.getElementById("alertMessage");

  alertMessage.innerText = message;
  alertBox.style.display = "block";

  // Esconde após 3 segundos
  setTimeout(() => {
    alertBox.style.display = "none";
  }, 3000);
}

function validateForm() {
  const form = document.querySelector('form');

  const senha = document.getElementById("senha_empresa").value;
  const confirmar = document.getElementById("confirmesenha").value;

  // Validação da senha
  const requisitos = [
    { regex: /.{6,}/, mensagem: "A senha deve ter no mínimo 6 caracteres." },
    { regex: /[A-Z]/, mensagem: "A senha deve ter pelo menos uma letra maiúscula." },
    { regex: /[a-z]/, mensagem: "A senha deve ter pelo menos uma letra minúscula." },
    { regex: /[0-9]/, mensagem: "A senha deve ter pelo menos um número." },
    { regex: /[!@#$%^&*(),.?\":{}|<>]/, mensagem: "A senha deve ter pelo menos um caractere especial." }
  ];

  for (let req of requisitos) {
    if (!req.regex.test(senha)) {
      showCustomAlert(req.mensagem);
      document.getElementById("senha_empresa").focus();
      return false;
    }
  }

  if (senha !== confirmar) {
    showCustomAlert("As senhas não coincidem.");
    document.getElementById("confirmesenha").focus();
    return false;
  }

  // Validação dos campos obrigatórios
  const requiredFields = form.querySelectorAll('[required]');
  for (let campo of requiredFields) {
    if (!campo.value.trim()) {
      let label = campo.labels && campo.labels[0] ? campo.labels[0].innerText : campo.placeholder || campo.name;
      showCustomAlert("Preencha o campo: " + label);
      campo.focus();
      return false;
    }
  }

  // Validação das modalidades (checkboxes)
  const modalidades = document.querySelectorAll('input[name="modalidades[]"]:checked');
  if (modalidades.length === 0) {
    showCustomAlert("Selecione pelo menos uma modalidade.");
    return false;
  }

  // Se tudo ok
  return true;
}

// Função para exibir preview da imagem carregada
function previewImage(event, previewId) {
  const input = event.target;
  const preview = document.getElementById(previewId);

  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
    };
    reader.readAsDataURL(input.files[0]);
  }
}
