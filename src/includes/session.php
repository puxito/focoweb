<?php
session_start();

$protected_pages = ['dashboard.php', 'profile.php', 'settings.php', 'chat.php'];

$current_page = basename($_SERVER['PHP_SELF']);

if (!isset($_SESSION['user_id']) && in_array($current_page, $protected_pages)) {

    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header('Location: ../pages/login.php');
    exit();
}

if (isset($_SESSION['user_id']) && in_array($current_page, ['login.php', 'register.php'])) {
    header('Location: dashboard.php');
    exit();
}
?>
