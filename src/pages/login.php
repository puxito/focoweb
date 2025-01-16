<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Foco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/login.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mb-4 text-center">Iniciar Sesión</h1>

        <!-- Mensaje de alerta -->
        <?php if (isset($_GET['message']) && isset($_GET['type'])): ?>
            <div class="alert alert-<?php echo htmlspecialchars($_GET['type']); ?>" role="alert">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="../api/login.php">
            <div class="mb-3">
                <label for="identifier" class="form-label">Nickname o Correo:</label>
                <input type="text" name="identifier" id="identifier" class="form-control" placeholder="Tu nickname o correo" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Tu contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
        </form>
        <p class="mt-3 text-center">
            <a href="register.php">¿No tienes cuenta? Regístrate</a>
        </p>
    </div>
</body>
</html>
