<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/registro.css">
    <link rel="shortcut icon" href="images/uneti.png" type="image/x-icon">
</head>
<body>
    <div class="image-container">
        <img src="images/uneti.png" alt="Logo">
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
</body>
</html>
