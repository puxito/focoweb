<?php
$title = "Inicio FOCO";
require_once '../includes/session.php';
include '../components/header.php';
?>
<div class="d-flex flex-column min-vh-100">
    <?php include '../components/navbar.php'; ?>
    <main class="flex-grow-1">
        <div class="container mt-4">
            <h1 class="text-center" style="color: #fff">Bienvenido a FOCO</h1>
            <p class="text-center">Plataforma para conectar freelancers y clientes.</p>
        </div>
    </main>

    <?php include '../components/footer.php'; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>