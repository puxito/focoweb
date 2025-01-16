<?php
require_once '../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $identifier = $_POST['identifier'] ?? null; // Puede ser nickname o correo
    $password = $_POST['password'] ?? null;

    // Validación básica
    if (!$identifier || !$password) {
        header("Location: ../pages/login.php?message=Por favor, ingresa tu nickname/correo y contraseña.&type=danger");
        exit;
    }

    // Verificar las credenciales
    try {
        // Buscar al usuario por nickname o correo
        $stmt = $pdo->prepare("
            SELECT idUser, passwd 
            FROM Users 
            WHERE nickname = ? OR email = ?
        ");
        $stmt->execute([$identifier, $identifier]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['passwd'])) {
            // Inicio de sesión exitoso
            $_SESSION['user_id'] = $user['idUser'];
            header('Location: ../pages/dashboard.php?message=Inicio de sesión exitoso.&type=success');
            exit;
        } else {
            // Credenciales inválidas
            header("Location: ../pages/login.php?message=Nickname/correo o contraseña incorrectos.&type=danger");
            exit;
        }
    } catch (PDOException $e) {
        header("Location: ../pages/login.php?message=Error al iniciar sesión: " . $e->getMessage() . "&type=danger");
        exit;
    }
}
?>
