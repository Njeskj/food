<?php
// Configurações de conexão com o banco de dados
$host = "localhost";
$dbname = "food";
$username = "root";
$password = "";

try {
    // Criar a conexão usando a extensão PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configurar o modo de erro do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Caso ocorra algum erro na conexão, exibir a mensagem de erro
    die("Falha na conexão com o banco de dados: " . $e->getMessage());
}
?>
