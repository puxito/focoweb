<?php
$title = "Perfil de Usuario";
require_once '../includes/session.php';
include '../components/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de @Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex">
            <!-- Sidebar -->
            <div class="sidebar bg-light p-3 rounded d-flex flex-column justify-content-between">
                <ul class="list-unstyled mb-0">
                    <li><a href="profile.php" class="text-decoration-none">Mi Perfil</a></li>
                    <li><a href="#" class="text-decoration-none">Seguridad</a></li>
                    <li><a href="#" class="text-decoration-none">Notificaciones</a></li>
                    <li><a href="#" class="text-decoration-none">Apariencia</a></li>
                </ul>
                <ul class="list-unstyled mt-4">
                    <li><a href="../api/logout.php" class="text-danger text-decoration-none">Cerrar Sesión</a></li>
                </ul>
            </div>

            <!-- Contenido principal -->
            <div class="profile-content flex-grow-1 d-flex justify-content-between">
                <!-- Información del perfil -->
                <div class="profile-details flex-grow-1 me-4">
                    <h1 class="text-center">Perfil de Usuario</h1>

                    <form id="profile-form" class="mt-4" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nickname" class="form-label">Nombre de Usuario</label>
                            <input type="text" id="nickname" name="nickname" class="form-control" placeholder="Tu nickname">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Tu nombre">
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Apellido</label>
                            <input type="text" id="surname" name="surname" class="form-control" placeholder="Tu apellido">
                        </div>
                        <div class="mb-3">
                            <label for="pronouns" class="form-label">Pronombres</label>
                            <select id="pronouns" name="pronouns" class="form-control">
                                <option value="">Seleccionar...</option>
                                <option value="he/him">He/Him</option>
                                <option value="she/her">She/Her</option>
                                <option value="they/them">They/Them</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="bday" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" id="bday" name="bday" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>

                <!-- Foto de perfil -->
                <div class="profile-picture text-center">
                    <img id="profile-pic" src="" alt="Foto de perfil" class="rounded-circle mb-3">
                    <div id="nickname-display" class="mt-2" style="font-weight: bold; color: #E94E1B;">@Usuario</div>
                    <label for="pfp" class="form-label mt-3">Cambiar Foto</label>
                    <input type="file" id="pfp" name="pfp" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const profilePic = document.getElementById('profile-pic');
            const nicknameInput = document.getElementById('nickname');
            const nicknameDisplay = document.getElementById('nickname-display');
            const pageTitle = document.getElementById('page-title');
            const form = document.getElementById('profile-form');

            axios.get('../api/profile.php')
                .then(response => {
                    const { nickname, name, surname, pfp, pronouns, bday } = response.data;
                    nicknameInput.value = nickname;
                    document.getElementById('name').value = name;
                    document.getElementById('surname').value = surname;
                    document.getElementById('pronouns').value = pronouns;
                    document.getElementById('bday').value = bday;
                    profilePic.src = `../${pfp}`;
                    nicknameDisplay.textContent = `@${nickname}`;
                });

            nicknameInput.addEventListener('input', () => {
                nicknameDisplay.textContent = `@${nicknameInput.value}`;
                pageTitle.textContent = `Perfil de @${nicknameInput.value}`;
            });

            form.addEventListener('submit', (event) => {
                event.preventDefault();
                const formData = new FormData(form);

                axios.post('../api/profile.php', formData)
                    .then(() => {
                        alert('Perfil actualizado correctamente');
                        location.reload();
                    });
            });
        });
    </script>
    <br>
    <?php
        include '../components/footer.php';
    
    ?>
</body>
</html>
