<?php
require_once '../includes/db.php'; // Conexión a la base de datos
require_once '../includes/functions.php'; // Función para obtener datos del usuario
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $identifier = $_POST['identifier'] ?? null; // Nickname o correo
    $password = $_POST['password'] ?? null;

    // Validación básica
    if (!$identifier || !$password) {
        header("Location: ../pages/login.php?message=Por favor, ingresa tu nickname/correo y contraseña.&type=danger");
        exit;
    }

    try {
        // Obtener los datos del usuario
        $user = getUserData($pdo, $identifier);

        if (!$user) {
            // Usuario no encontrado
            header("Location: ../pages/login.php?message=Usuario no encontrado.&type=danger");
            exit;
        }

        if (password_verify($password, $user['passwd'])) {
            // Guardar los datos del usuario en la sesión
            $_SESSION['user_id'] = $user['idUser'];
            $_SESSION['role_id'] = $user['idRoleFK'];
            $_SESSION['user_nickname'] = $user['nickname'];
            $_SESSION['user_pfp'] = $user['pfp'];

            // Redirigir según el rol
            if ($user['idRoleFK'] == 1) { // 1: Admin
                header('Location: ../pages/dashboard.php?message=Bienvenido, administrador.&type=success');
            } elseif ($user['idRoleFK'] == 2) { // 2: Usuario normal
                header('Location: ../pages/index.php?message=Bienvenido, ' . htmlspecialchars($user['nickname']) . '.&type=success');
            } else {
                header('Location: ../pages/dashboard.php?message=Bienvenido a tu panel, ' . htmlspecialchars($user['nickname']) . '.&type=success');
            }
            exit;
        } else {
            // Contraseña incorrecta
            header("Location: ../pages/login.php?message=Contraseña incorrecta.&type=danger");
            exit;
        }
    } catch (Exception $e) {
        // Error al obtener los datos
        header("Location: ../pages/login.php?message=" . $e->getMessage() . "&type=danger");
        exit;
    }
}
?>
