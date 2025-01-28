<?php 
session_start();

$host = 'dpg-cu94id1opnds73aoq83g-a.oregon-postgres.render.com';
$dbname = 'evaluacion_7jrj';
$user = 'evaluacion_7jrj_user'; 
$password = 'Yx6sA5dfWqlxEubahSh8EhPOLyuyoxme'; 

try {
    // Conexión a la base de datos en postgresql
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);
    $correo = trim($_POST['correo']);

    // Validar para que los campos no estén vacíos
    if (empty($usuario) || empty($contrasena) || empty($correo)) {
        $_SESSION['error'] = "Todos los campos son obligatorios.";
        header('Location: registro.php');
        exit;
    }

    // Validar que el correo sea válido en la base de datos de mi postgresql
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Por favor, ingresa un correo electrónico válido.";
        header('Location: registro.php');
        exit;
    }

    // Hash de la contraseña para más seguridad
    $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar el nuevo usuario en la base de datos (tabla registros)
    try {
        $stmt = $pdo->prepare("INSERT INTO registros (usuario, contrasena, correo) VALUES (:usuario, :contrasena, :correo)");
        $stmt->execute(['usuario' => $usuario, 'contrasena' => $hashedPassword, 'correo' => $correo]);
        $_SESSION['mensaje'] = "¡Te has registrado correctamente!";
        header('Location: validar.php');
        exit;
    } catch (PDOException $e) {
        if ($e->getCode() == 23505) { // Código de error para violación de restricción única
            $_SESSION['error'] = "El usuario o correo ya está registrado.";
        } else {
            $_SESSION['error'] = "Error al registrar el usuario: " . $e->getMessage();
        }
        header('Location: registro.php');
        exit;
    }
}
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

            <!-- Formulario del Registro -->

            <form action="registro.php" method="post">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>

                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>

                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" placeholder="Correo Electrónico" required>

                <button type="submit">Registrarse</button>
                <a href="inicio_sesion.php">Iniciar Sesión</a>
                <a href="index.html">Volver al Inicio</a>

                <!-- Mensajes de éxito o error escritos en php -->
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
