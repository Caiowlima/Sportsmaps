function validarSenhas() {
    // Verificar se o formulário é válido antes de validar as senhas
    if (!document.querySelector("form").checkValidity()) {
        // Adiciona a classe was-validated para mostrar mensagens de erro
        document.querySelector('form').classList.add('was-validated');
        return false; // Impede o envio do formulário se algum campo obrigatório não for preenchido
    }

    // Captura os valores dos campos de senha e confirmar senha
    const senha = document.getElementById("senha").value;
    const confirmarSenha = document.getElementById("confirmarSenha").value;

    // Verifica se as senhas são iguais
    if (senha !== confirmarSenha) {
        // Exibe uma mensagem de erro caso as senhas não coincidam
        alert("As senhas não coincidem! Por favor, tente novamente.");
        return false;  // Impede o envio do formulário
    }

    return true;  // Permite o envio do formulário se tudo estiver correto
    }
    