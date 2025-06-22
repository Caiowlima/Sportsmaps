<?php
session_start();
include_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    function mostrarAlerta($mensagem, $tipo, $urlRedirecionar) {
        $corFundo = ($tipo === 'success') ? 'rgba(76, 175, 80, 0.8)' : 'rgba(244, 67, 54, 0.8)';

        echo "<!DOCTYPE html>
        <html lang='pt-br'>
        <head>
        <meta charset='UTF-8'>
        <style>
            .alert-custom {
                position: fixed;
                top: 20px;
                left: 50%;
                transform: translateX(-50%);
                background-color: {$corFundo};
                color: white;
                font-weight: bold;
                padding: 15px 20px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
                font-family: Arial, sans-serif;
                z-index: 9999;
                text-align: center;
                opacity: 0.7;
                transition: opacity 0.4s ease-in-out;
                max-width: 90%;
                width: fit-content;
                word-wrap: break-word;
            }

            .alert-show {
                opacity: 0.80;
            }
        </style>
        </head>
        <body>
            <div class='alert-custom' id='alerta'>$mensagem</div>

            <script>
                document.getElementById('alerta').classList.add('alert-show');
                setTimeout(function() {
                    window.location.href = '$urlRedirecionar';
                }, 2500);
            </script>
        </body>
        </html>";
        exit;
    }

    function autenticarUsuario($pdo, $email, $senha) {
        $query = "SELECT * FROM tab_usuario WHERE email_usuario = :email LIMIT 1";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($senha, $usuario['senha_usuario'])) {
                return $usuario;
            } else {
                return 'senha_incorreta';
            }
        }
        return null;
    }

    $resultado = autenticarUsuario($pdo, $email, $senha);

    if ($resultado === 'senha_incorreta') {
        mostrarAlerta('Senha incorreta. Tente novamente.', 'error', '../login.php');
    } elseif ($resultado === null) {
        mostrarAlerta('E-mail não encontrado. Verifique e tente novamente.', 'error', '../login.php');
    } else {
        $_SESSION['usuario_nome'] = $resultado['nome_usuario'];
        $_SESSION['usuario_email'] = $resultado['email_usuario'];
        $_SESSION['id_usuario'] = $resultado['id_usuario'];
        $_SESSION['login_success'] = "Login realizado com sucesso!";

        mostrarAlerta('Login realizado com sucesso! Bem-vindo ao Sportmaps.', 'success', '../eventos.php');
    }
}
?>
