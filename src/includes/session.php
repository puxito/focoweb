<?php
ob_start(); // Habilita el buffer de salida
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
