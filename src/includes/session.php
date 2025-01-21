<?php
session_start();

// Páginas que requieren autenticación
$protected_pages = ['dashboard.php', 'profile.php', 'settings.php', 'chat.php'];

// Obtén el nombre del archivo actual
$current_page = basename($_SERVER['PHP_SELF']);

if (!isset($_SESSION['user_id']) && in_array($current_page, $protected_pages)) {
    // Guardar la URL a la que intentaba acceder el usuario
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header('Location: ../pages/login.php');
    exit();
}

if (isset($_SESSION['user_id']) && in_array($current_page, ['login.php', 'register.php'])) {
    header('Location: dashboard.php');
    exit();
}
?>
