<?php 
session_start();

// Verificar si el usuario ha sido registrado correctamente
if (!isset($_SESSION['mensaje'])) {
    header('Location: registro.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Registro Exitoso!</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/validar.css">
    <link rel="shortcut icon" href="images/uneti.png" type="image/x-icon">
</head>
<body>
    <div class="image-container">
        <img src="assets/images/uneti.png" alt="Logo">
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
