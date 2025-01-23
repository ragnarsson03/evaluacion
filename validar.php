<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Registro Exitoso!</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="images/uneti.png" type="image/x-icon">
</head>
<body>
    <div class="image-container">
        <img src="images/uneti.png" alt="Logo">
    </div>

    <div class="login-container">
        <div class="formulario">
            <h2>¡Te has registrado correctamente!</h2>
            <p>Ahora puedes iniciar sesión con tus datos.</p>
            <a href="inicio_sesion.php">Ir a Iniciar Sesión</a>

            <?php if (isset($_SESSION['mensaje'])): ?>
                <p class="success-message"><?php echo $_SESSION['mensaje']; ?></p>
                <?php unset($_SESSION['mensaje']); ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
