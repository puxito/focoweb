<?php
session_start();
session_destroy();
header('Location: ../pages/index.php?message=Sesión cerrada correctamente.&type=success');
exit;
?>
