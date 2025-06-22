<?php
session_start();
include_once('conexao.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    die("Erro: Usuário não autenticado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validação básica
    if (
        empty($_POST['id_mod_empresa']) ||
        empty($_POST['id_data_hora']) ||
        empty($_POST['horario_inicio_reserva']) ||
        empty($_POST['horario_fim_reserva'])
    ) {
        die("Erro: Todos os campos devem ser preenchidos.");
    }

    // Dados do formulário
    $id_usuario = $_SESSION['id_usuario'];
    $id_mod_empresa = (int) $_POST['id_mod_empresa'];
    $id_data_hora = (int) $_POST['id_data_hora'];
    $horario_inicio_reserva = $_POST['horario_inicio_reserva'];
    $horario_fim_reserva = $_POST['horario_fim_reserva'];
    $data_criacao = date('Y-m-d H:i:s');

    try {
        $stmt = $pdo->prepare("
            INSERT INTO tab_reserva (
                id_usuario,
                id_mod_empresa,
                id_data_hora,
                horario_inicio_reserva,
                horario_fim_reserva,
                data_criacao
            ) VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $id_usuario,
            $id_mod_empresa,
            $id_data_hora,
            $horario_inicio_reserva,
            $horario_fim_reserva,
            $data_criacao
        ]);

        // Redireciona com sucesso
        header("Location: ../usuario/perfilusuario.php?msg=sucesso");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao salvar reserva: " . $e->getMessage();
        exit;
    }
} else {
    echo "Acesso inválido.";
}
