<?php 
include_once('../php_config/conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Dados da empresa
    $nome_fantasia = $_POST['nome_fantasia'];  
    $razao_social = $_POST['razao_social']; 
    $cnpj_empresa = $_POST['cnpj'];  
    $senha_empresa = password_hash($_POST['senha_empresa'], PASSWORD_DEFAULT);
    $end_empresa = $_POST['endereco'];  
    $numero_end_empresa = $_POST['numero_end'];  
    $cep_empresa = $_POST['cep'];  
    $bairro_empresa = $_POST['bairro'];  
    $cidade_empresa = $_POST['cidade'];  
    $estado_empresa = $_POST['uf'];  
    $tel_empresa = $_POST['telefone_empresa'];  
    $email_empresa = $_POST['email_empresa'];  
    $complemento_emp = $_POST['descricao'] ?? null;

    // Upload de imagens
    $diretorio = "../empresa/img/uploads/";
    if (!is_dir($diretorio)) mkdir($diretorio, 0777, true);

    function uploadArquivo($arquivo, $diretorio) {
        if (isset($arquivo) && $arquivo['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
            $nomeNovo = uniqid('img_') . '.' . $ext;
            $destino = $diretorio . $nomeNovo;
            if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
                return $nomeNovo;
            }
        }
        return null;
    }

    $foto1_emp = uploadArquivo($_FILES['foto1_emp'] ?? null, $diretorio);
    $foto2_emp = uploadArquivo($_FILES['foto2_emp'] ?? null, $diretorio);
    $foto3_emp = uploadArquivo($_FILES['foto3_emp'] ?? null, $diretorio);

    // Inserir empresa
    $query = "INSERT INTO tab_empresa (
        nome_fantasia, razao_social, cnpj_empresa, senha_empresa, end_empresa,
        numero_end_empresa, cep_empresa, bairro_empresa, cidade_empresa,
        estado_empresa, tel_empresa, email_empresa, foto1_emp, foto2_emp,
        foto3_emp, complemento_emp
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        $nome_fantasia, $razao_social, $cnpj_empresa, $senha_empresa, $end_empresa,
        $numero_end_empresa, $cep_empresa, $bairro_empresa, $cidade_empresa,
        $estado_empresa, $tel_empresa, $email_empresa, $foto1_emp, $foto2_emp,
        $foto3_emp, $complemento_emp
    ]);

    $empresa_id = $pdo->lastInsertId();

    // Modalidades
    if (!empty($_POST['modalidades'])) {
        $queryModal = "INSERT INTO tab_mod_empresa (id_empresa, modalidade, quantidade_minima, quantidade_maxima) VALUES (?, ?, ?, ?)";
        $stmtModal = $pdo->prepare($queryModal);

        foreach ($_POST['modalidades'] as $modalidade) {
            $qtd_min = $_POST["{$modalidade}_input1"] ?? null;
            $qtd_max = $_POST["{$modalidade}_input2"] ?? null;

            $stmtModal->execute([$empresa_id, $modalidade, $qtd_min, $qtd_max]);
        }
    }

    // Inserir dias e horários diretamente na tab_data_hora
    if (!empty($_POST['dias_semana'])) {
        $queryDataHora = "INSERT INTO tab_data_hora (id_empresa, dia_semana, horario_inicio, horario_fim) VALUES (?, ?, ?, ?)";
        $stmtDataHora = $pdo->prepare($queryDataHora);

        $horario_inicio = $_POST['horario_inicio'] ?? [];
        $horario_fim = $_POST['horario_fim'] ?? [];

        foreach ($_POST['dias_semana'] as $dia) {
            $inicio = $horario_inicio[$dia] ?? null;
            $fim = $horario_fim[$dia] ?? null;
            if (!empty($inicio) && !empty($fim)) {
                $stmtDataHora->execute([$empresa_id, $dia, $inicio, $fim]);
            }
        }
    }

    header("Location: ../login.php");
    exit;
}
?>
