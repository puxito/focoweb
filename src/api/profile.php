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
        $stmt = $pdo->prepare("SELECT nickname, name, surname, email, pfp, pronouns, bday FROM Users WHERE idUser = ?");
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
    $pronouns = $_POST['pronouns'] ?? null;
    $bday = $_POST['bday'] ?? null;
    $uploadDir = '../assets/images/user_uploads/';

    try {
        // Actualizar datos básicos del perfil
        $stmt = $pdo->prepare("UPDATE Users SET name = ?, surname = ?, nickname = ?, pronouns = ?, bday = ? WHERE idUser = ?");
        $stmt->execute([$name, $surname, $nickname, $pronouns, $bday, $userId]);

        // Manejar subida de foto de perfil
        if (isset($_FILES['pfp']) && $_FILES['pfp']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['pfp']['tmp_name'];
            $fileName = uniqid() . '-' . basename($_FILES['pfp']['name']);
            $filePath = $uploadDir . $fileName;

            // Mover el archivo al directorio deseado
            if (move_uploaded_file($fileTmpPath, $filePath)) {
                // Generar la ruta relativa para la base de datos
                $relativePath = 'assets/images/user_uploads/' . $fileName;

                // Actualizar la base de datos con la nueva ruta
                $stmt = $pdo->prepare("UPDATE Users SET pfp = ? WHERE idUser = ?");
                $stmt->execute([$relativePath, $userId]);

                // Opcional: Eliminar la imagen anterior del servidor (si no es la predeterminada)
                $stmt = $pdo->prepare("SELECT pfp FROM Users WHERE idUser = ?");
                $stmt->execute([$userId]);
                $currentPfp = $stmt->fetchColumn();

                if ($currentPfp !== 'assets/images/defaults/profile.png' && file_exists('../' . $currentPfp)) {
                    unlink('../' . $currentPfp);
                }
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Error al subir la imagen']);
                exit;
            }
        }

        echo json_encode(['success' => 'Perfil actualizado correctamente']);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Error al actualizar el perfil']);
    }
}
?>
