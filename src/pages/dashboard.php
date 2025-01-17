<?php
require_once '../includes/session.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - FOCO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        <!-- Navbar del Dashboard -->
        <?php include '../components/dashboard_navbar.php'; ?>

        <!-- Contenido principal -->
        <main class="flex-grow-1">
            <div class="container mt-5">
                <h1 class="text-center">Dashboard</h1>

                <div class="dashboard-menu mt-4">
                    <div class="dashboard-card">
                        <h3>Mis Gigs</h3>
                        <p>Visualiza y administra tus gigs publicados.</p>
                        <a href="gigs.php" class="btn btn-primary">Ver Gigs</a>
                    </div>
                    <div class="dashboard-card">
                        <h3>Pedidos</h3>
                        <p>Revisa los pedidos recibidos y completados.</p>
                        <a href="orders.php" class="btn btn-primary">Ver Pedidos</a>
                    </div>
                    <div class="dashboard-card">
                        <h3>Estadísticas</h3>
                        <p>Analiza tu rendimiento y reseñas.</p>
                        <a href="analytics.php" class="btn btn-primary">Ver Estadísticas</a>
                    </div>
                </div>

                <p class="text-center mt-4">
                    <a href="../api/logout.php" class="text-danger">Cerrar Sesión</a>
                </p>
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <?php include '../components/footer.php'; ?>
        </footer>
    </div>

    <!-- Scripts necesarios -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
