<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - UNETI</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/images/uneti.png" type="image/x-icon">
</head>
<body>
    <div class="image-container">
        <img src="assets/images/uneti.png" alt="Logo">
    </div>

    <div class="register-container">
        <div class="formulario">
            <h2>Registro</h2>
            <!-- Formulario de Registro -->
            <form action="sesion.php" method="post">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>

                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>

                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" placeholder="Correo Electrónico" required>

                <button type="submit">Registrarse</button>
                <a href="inicio_sesion.php">Iniciar Sesión</a>

                <!-- Mensajes de éxito o error -->
                <?php if (isset($_SESSION['mensaje'])): ?>
                    <p class="success-message"><?php echo $_SESSION['mensaje']; ?></p>
                    <?php unset($_SESSION['mensaje']); ?>
                <?php endif; ?>
                <?php if (isset($_SESSION['error'])): ?>
                    <p class="error-message"><?php echo $_SESSION['error']; ?></p>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
            </form>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("form");
        form.addEventListener("submit", function(event) {
            const usuario = document.getElementById("usuario").value;
            const contrasena = document.getElementById("contrasena").value;
            const correo = document.getElementById("correo").value;

            if (usuario === "" || contrasena === "" || correo === "") {
                alert("Todos los campos son obligatorios.");
                event.preventDefault();
            } else if (!validateEmail(correo)) {
                alert("Por favor, ingresa un correo electrónico válido.");
                event.preventDefault();
            }
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
        }
    });
    </script>
</body>
</html>
