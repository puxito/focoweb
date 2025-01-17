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
            max-width: 900px;
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
        .dashboard-menu {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .dashboard-card {
            background: #FBEBD5;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1;
            margin: 0 10px;
        }
        .dashboard-card h3 {
            font-size: 1.5rem;
            color: #A62858;
            font-weight: 600;
        }
        .dashboard-card p {
            font-size: 1rem;
            color: #333;
        }
        footer {
            margin-top: auto;
            background-color: #fff;
            text-align: center;
            padding: 10px;
            border-top: 1px solid #ddd;
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
        <h1>Dashboard</h1>

        <div class="dashboard-menu mt-4">
            <div class="dashboard-card">
                <h3>Mis Gigs</h3>
                <p>Visualiza y administra tus gigs publicados.</p>
                <a href="#" class="btn btn-primary">Ver Gigs</a>
            </div>
            <div class="dashboard-card">
                <h3>Pedidos</h3>
                <p>Revisa los pedidos recibidos y completados.</p>
                <a href="#" class="btn btn-primary">Ver Pedidos</a>
            </div>
            <div class="dashboard-card">
                <h3>Estadísticas</h3>
                <p>Analiza tu rendimiento y reseñas.</p>
                <a href="#" class="btn btn-primary">Ver Estadísticas</a>
            </div>
        </div>

        <p class="text-center mt-4">
            <a href="../api/logout.php">Cerrar Sesión</a>
        </p>
    </div>

    <footer>
        <?php include '../components/footer.php'; ?>
    </footer>
</body>
</html>
