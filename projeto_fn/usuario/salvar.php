<?php 
// Inclusão do arquivo de conexão com o banco de dados
include_once('../php_config/conexao.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Pegando os dados do formulário
    $nome_usuario = $_POST['nome'];  // Nome do usuário
    $cpf_usuario = $_POST['cpf'];  // CPF
    $nasc_usuario= $_POST['nasc'];  // Data de nascimento
    $email_usuario= $_POST['email'];  // E-mail
   $senha_usuario = password_hash($_POST['senha'], PASSWORD_DEFAULT);  // Senha com hash seguro
    $rg_usuario = $_POST['rg'];  // RG
    $celular_usuario = $_POST['celular'];  // Celular
    $cep_usuario = $_POST['cep'];  // CEP
    $end_usuario= $_POST['endereco'];  // end_usuario
    $end_usuario_numero = $_POST['numero_end'];  // Número
    $bairro_usuario = $_POST['bairro'];  // Bairro
    $cidade_usuario= $_POST['cidade'];  // Cidade
    $estado_usuario = $_POST['uf'];  // UF
    $foto_usuario = $_POST['foto_usuario']['name']?? null;  // Inicializa o campo foto_usuario com valor vazio
    $complemento_end_user = $_POST['complemento'];

    // Verificando se a foto foi enviada
    if (!empty($_FILES['foto']['name'])) {
        // Gerando um nome único para a foto
        $nomeFoto = $_FILES['foto']['name'];
        $diretorio = "img/uploads/";  // Caminho do diretório para salvar a foto
        $caminhoCompleto = $diretorio . basename($nomeFoto);

        // Verifica se o diretório existe, senão cria
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0777, true);
        }

        // Realizando o upload da foto
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoCompleto)) {
            $foto_usuario = $caminhoCompleto;  // Armazenando o caminho da foto
        } else {
            echo "Erro ao fazer upload da foto.";
            exit(); // Encerra o script em caso de erro no upload
        }
    }



    // Criando a Query para inserir os dados no banco de dados
    $query = "INSERT INTO tab_usuario (nome_usuario, cpf_usuario, nasc_usuario, email_usuario, senha_usuario, rg_usuario, celular_usuario, 
       cep_usuario, end_usuario, end_usuario_numero, bairro_usuario, cidade_usuario, estado_usuario, foto_usuario, complemento_end_user) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

    // Preparando a consulta
    $stmt = $pdo->prepare($query);
    // Vinculando os valores corretamente aos parâmetros da consulta
    $stmt->bindValue(1, $nome_usuario);  // Nome
    $stmt->bindValue(2, $cpf_usuario);  // CPF
    $stmt->bindValue(3, $nasc_usuario);  // Data de nascimento
    $stmt->bindValue(4, $email_usuario);  // E-mail
    $stmt->bindValue(5, $senha_usuario);  // Senha criptografada (hash)
    $stmt->bindValue(6, $rg_usuario);  // RG
    $stmt->bindValue(7, $celular_usuario);  // Celular
    $stmt->bindValue(8, $cep_usuario);  // CEP
    $stmt->bindValue(9, $end_usuario);  // end_usuario
    $stmt->bindValue(10, $end_usuario_numero);  // Número
    $stmt->bindValue(11, $bairro_usuario);  // Bairro
    $stmt->bindValue(12, $cidade_usuario);  // Cidade
    $stmt->bindValue(13, $estado_usuario);  // UF
    $stmt->bindValue(14, $foto_usuario);  // Foto
    $stmt->bindValue(15, $complemento_end_user);
    // Executando a consulta
    if ($stmt->execute()) {
        // Se a inserção foi bem-sucedida, redireciona para a página de eventos
        header("Location: ../login.php");
        exit(); // Encerra o script para garantir o redirecionamento
    } else {
        // Exibe erro se falhar
        echo "Erro ao criar usuário. Por favor, tente novamente.";
    }
}

?>
