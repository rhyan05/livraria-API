<?php
$host = "localhost"; 
$db_name = "livraria_bd_api"; 
$username = "root"; 
$password = ""; 

try {
    // Conecta ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    // Caso haja erro na conexão, exibe a mensagem
    die("Connection error: " . $exception->getMessage());
}
?>
