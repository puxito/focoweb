<?php
require_once '../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo json_encode(['error' => 'No autorizado']);
        exit;
    }

    $userId = $_SESSION['user_id'];

    try {
        $stmt = $pdo->prepare("SELECT nickname, name, surname, email, pfp, entryDate FROM Users WHERE idUser = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo json_encode($user);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Usuario no encontrado']);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Error en el servidor']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo json_encode(['error' => 'No autorizado']);
        exit;
    }

    $userId = $_SESSION['user_id'];
    $name = $_POST['name'] ?? null;
    $surname = $_POST['surname'] ?? null;
    $nickname = $_POST['nickname'] ?? null;
    $uploadDir = '../assets/images/user_uploads/';

    try {
        // Actualizar texto del perfil
        $stmt = $pdo->prepare("UPDATE Users SET name = ?, surname = ?, nickname = ? WHERE idUser = ?");
        $stmt->execute([$name, $surname, $nickname, $userId]);

        // Manejar subida de foto de perfil
        if (isset($_FILES['pfp']) && $_FILES['pfp']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['pfp']['tmp_name'];
            $fileName = uniqid() . '-' . $_FILES['pfp']['name'];
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $filePath)) {
                // Actualizar la ruta en la base de datos
                $relativePath = 'assets/images/user_uploads/' . $fileName;
                $stmt = $pdo->prepare("UPDATE Users SET pfp = ? WHERE idUser = ?");
                $stmt->execute([$relativePath, $userId]);
            }
        }

        echo json_encode(['success' => 'Perfil actualizado correctamente']);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Error al actualizar el perfil']);
    }
}
?>
