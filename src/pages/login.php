<?php
require_once '../includes/session.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - FOCO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #E94E1B, #FBEBD5);
            color: #333;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 500px;
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            color: #E94E1B;
        }
        label {
            font-weight: 500;
            color: #A62858;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .btn-primary {
            background: #A62858;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 1rem;
            transition: background 0.3s ease;
        }
        .btn-primary:hover {
            background: #C6838B;
        }
        a {
            color: #E94E1B;
            font-weight: 600;
        }
        a:hover {
            color: #C6838B;
        }
        footer {
            margin-top: auto;
            background-color: #fff;
            text-align: center;
            padding: 10px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Inicio de Sesión</h1>

        <!-- Mensaje de alerta -->
        <?php if (isset($_GET['message']) && isset($_GET['type'])): ?>
            <div class="alert alert-<?php echo htmlspecialchars($_GET['type']); ?>" role="alert">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="../api/login.php" class="mt-4">
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
        <p class="mt-4 text-center">
            ¿No tienes cuenta? <a href="register.php">Regístrate</a>
        </p>
    </div>

    <footer class="mt-5">
        <?php include '../components/footer.php'; ?>
    </footer>
</body>
</html>
