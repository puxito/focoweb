<?php
require_once '../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = $_POST['identifier'] ?? null;
    $password = $_POST['password'] ?? null;

    if (!$identifier || !$password) {
        $_SESSION['alert'] = ['message' => 'Por favor, ingresa tu nickname/correo y contraseña.', 'type' => 'danger'];
        header("Location: ../pages/login.php");
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT idUser, passwd, idRoleFK, nickname, pfp FROM Users WHERE nickname = ? OR email = ?");
        $stmt->execute([$identifier, $identifier]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['passwd'])) {
            $_SESSION['user_id'] = $user['idUser'];
            $_SESSION['role_id'] = $user['idRoleFK'];
            $_SESSION['user_nickname'] = $user['nickname'];
            $_SESSION['user_pfp'] = $user['pfp'];

            if ($user['idRoleFK'] == 1) {
                header("Location: ../pages/dashboard.php");
            } else {
                header("Location: ../pages/index.php");
            }
            exit;
        } else {
            $_SESSION['alert'] = ['message' => 'Credenciales incorrectas.', 'type' => 'danger'];
            header("Location: ../pages/login.php");
            exit;
        }
    } catch (Exception $e) {
        $_SESSION['alert'] = ['message' => 'Error en el sistema.', 'type' => 'danger'];
        header("Location: ../pages/login.php");
        exit;
    }
}
?>
