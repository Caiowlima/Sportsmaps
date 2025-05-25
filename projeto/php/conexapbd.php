<?php
// /config/db.php
$host = 'localhost';  // Host do banco de dados
$dbname = 'escolabd'; // Nome do banco de dados
$username = 'root';   // Nome de usuário do MySQL
$password = '';       // Senha do MySQL (normalmente vazio no XAMPP)

try {
    // Conectar ao banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Se houver erro de conexão, exibe a mensagem
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
