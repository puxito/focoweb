<?php
require_once '../includes/session.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - FOCO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #E94E1B, #FBEBD5);
            color: #333;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 500px;
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
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
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Registro</h1>
        <?php if (isset($_GET['message']) && isset($_GET['type'])): ?>
            <div class="alert alert-<?php echo htmlspecialchars($_GET['type']); ?>" role="alert">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="../api/register.php" class="mt-4">
            <div class="mb-3">
                <label for="nickname" class="form-label">Nickname:</label>
                <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Tu nickname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Tu correo electrónico" required>
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
        <p class="mt-4 text-center">
            ¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a>
        </p>
    </div>

    <footer class="mt-5">
        <?php include '../components/footer.php'; ?>
    </footer>
</body>

</html>