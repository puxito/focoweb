<?php
session_start();

// Redirige al login si el usuario no ha iniciado sesión
if (!isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) !== 'login.php') {
    header('Location: login.php');
    exit();
}
?>
