<?php

function getUserData($pdo, $identifier) {
    try {
        $stmt = $pdo->prepare("
            SELECT idUser, passwd, idRoleFK, nickname, pfp 
            FROM Users 
            WHERE nickname = ? OR email = ?
        ");
        $stmt->execute([$identifier, $identifier]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un array asociativo
    } catch (PDOException $e) {
        throw new Exception("Error al obtener los datos del usuario: " . $e->getMessage());
    }
}
