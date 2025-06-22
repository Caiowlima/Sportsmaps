<?php
// Configurações do banco de dados

$host = 'localhost';           // Endereço do servidor do banco de dados (localhost ou IP)
              // Porta usada pelo MySQL (padrão é 3306, aqui é 3307)
$dbname = 'bd_sportmaps16_06';  // Nome do banco de dados que será acessado
$username = 'root';            // Nome de usuário para conectar ao banco
$password = '';            // Senha do usuário

try {
    // Cria uma nova conexão PDO com o banco de dados MySQL
    // A string de conexão inclui o host, a porta e o nome do banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Define o modo de erro do PDO para lançar exceções (útil para tratar erros de forma controlada)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Caso ocorra um erro na conexão, exibe uma mensagem com o detalhe do erro
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
