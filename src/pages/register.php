<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Foco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/register.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mb-4 text-center">Registro</h1>

        <!-- Mensaje de alerta -->
        <?php if (isset($_GET['message']) && isset($_GET['type'])): ?>
            <div class="alert alert-<?php echo htmlspecialchars($_GET['type']); ?>" role="alert">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="../api/register.php">
            <div class="mb-3">
                <label for="nickname" class="form-label">Nickname:</label>
                <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Tu nickname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Tu correo" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Tu contraseña" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Tu nombre" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Apellido:</label>
                <input type="text" name="surname" id="surname" class="form-control" placeholder="Tu apellido">
            </div>
            <div class="mb-3">
                <label for="pronouns" class="form-label">Pronombres:</label>
                <select name="pronouns" id="pronouns" class="form-control" required>
                    <option value="">Selecciona tus pronombres</option>
                    <option value="he/him">He/Him</option>
                    <option value="she/her">She/Her</option>
                    <option value="they/them">They/Them</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="bday" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" name="bday" id="bday" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
        </form>
        <p class="mt-3 text-center">
            <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
        </p>
    </div>
</body>
</html>
