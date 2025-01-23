<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - UNETI</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/images/uneti.png" type="image/x-icon">
</head>
<body>
    <div class="image-container">
        <img src="assets/images/uneti.png" alt="Logo">
    </div>

    <div class="login-container">
        <!-- Formulario de Inicio de Sesión -->
        <div class="formulario">
            <h2>Iniciar Sesión</h2>
            <form action="sesion.php" method="post">
                <input type="text" name="usuario" placeholder="Usuario" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit">Ingresar</button>

                <?php if (isset($_SESSION['error'])): ?>
                    <p class="error-message"><?php echo $_SESSION['error']; ?></p>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <?php if (isset($_GET['timeout']) && $_GET['timeout'] === 'true'): ?>
                    <p class="error-message">Tu sesión ha expirado por inactividad. Por favor, vuelve a iniciar sesión.</p>
                <?php endif; ?>
                <a href="registro.php">¿No tienes cuenta? Regístrate aquí</a>
            </form>
        </div>
    </div>
</body>
</html>
