<?php
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nickname = $_POST['nickname'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $name = $_POST['name'] ?? null;
    $surname = $_POST['surname'] ?? null;
    $pronouns = $_POST['pronouns'] ?? '';
    $bday = $_POST['bday'] ?? null;


    if (!$nickname || !$email || !$password || !$name || !$pronouns) {
        header("Location: ../pages/register.php?message=Todos los campos obligatorios deben ser completados.&type=danger");
        exit;
    }

    $passwordRegex = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)(?=.*[!@#$%^&*])[A-Za-z\\d!@#$%^&*]{8,}$/';
    if (!preg_match($passwordRegex, $password)) {
        header("Location: ../pages/register.php?message=La contraseña debe tener al menos 8 caracteres, incluir una letra mayúscula, un número y un carácter especial.&type=danger");
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        $stmt = $pdo->prepare("
            INSERT INTO Users (idRoleFK, nickname, email, passwd, name, surname, pfp, pronouns, bday)
            VALUES (2, ?, ?, ?, ?, ?, 'assets/images/defaults/profile.png', ?, ?)
        ");
        $stmt->execute([$nickname, $email, $hashedPassword, $name, $surname, $pronouns, $bday]);
        header("Location: ../pages/register.php?message=Registro exitoso. Ahora puedes iniciar sesión.&type=success");
        exit;
    } catch (PDOException $e) {
        header("Location: ../pages/register.php?message=Error al registrar usuario: " . $e->getMessage() . "&type=danger");
        exit;
    }
}
?>
