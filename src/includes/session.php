<?php
session_start();

// Páginas que requieren autenticación
$protected_pages = ['dashboard.php', 'profile.php', 'settings.php', 'chat.php'];

// Obtén el nombre del archivo actual
$current_page = basename($_SERVER['PHP_SELF']);

// Si el usuario no ha iniciado sesión y está intentando acceder a una página protegida
if (!isset($_SESSION['user_id']) && in_array($current_page, $protected_pages)) {
    header('Location: login.php');
    exit();
}

// Si el usuario ha iniciado sesión pero intenta acceder al login o registro, redirígelo al dashboard
if (isset($_SESSION['user_id']) && in_array($current_page, ['login.php', 'register.php'])) {
    header('Location: dashboard.php');
    exit();
}
?>
