<?php
$host = getenv('DB_HOST') ?: 'db'; 
$dbname = getenv('MYSQL_DATABASE') ?: 'foco';
$username = getenv('MYSQL_USER') ?: 'puchito';
$password = getenv('MYSQL_PASSWORD') ?: 'Cruzcampo123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>
