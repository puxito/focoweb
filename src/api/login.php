<?php
require_once '../includes/db.php';
session_start();

date_default_timezone_set('Europe/Madrid');


$pdo->exec("SET time_zone = '+01:00'");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = $_POST['identifier'] ?? null;
    $password = $_POST['password'] ?? null;

    if (!$identifier || !$password) {
        header("Location: ../pages/login.php?message=Por favor, ingresa tu nickname/correo y contraseña.&type=danger");
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

           
            $updateStmt = $pdo->prepare("UPDATE Users SET lastLogin = NOW() WHERE idUser = ?");
            $updateStmt->execute([$user['idUser']]);

           
            if ($user['idRoleFK'] == 1) { // Administrador
                header("Location: ../pages/dashboard.php");
            } else { // Usuario normal
                header("Location: ../pages/index.php");
            }
            exit;
        } else {
            
            header("Location: ../pages/login.php?message=Credenciales incorrectas.&type=danger");
            exit;
        }
    } catch (Exception $e) {
        
        header("Location: ../pages/login.php?message=Error en el sistema.&type=danger");
        exit;
    }
}
