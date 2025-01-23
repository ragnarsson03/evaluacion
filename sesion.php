<?php
session_start();

// Conexión a la base de datos
$host = 'localhost';
$dbname = 'evaluacion';
$user = 'postgres';  // Cambiar por tu usuario
$password = '6666';  // Cambiar por tu contraseña

try {
    // Conexión a la base de datos
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    // Validar que los campos no estén vacíos
    if (empty($usuario) || empty($contrasena)) {
        $_SESSION['error'] = "Por favor, ingresa tu usuario y contraseña.";
        header('Location: inicio_sesion.php');
        exit;
    }

    // Buscar al usuario en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM registros WHERE usuario = :usuario");
    $stmt->execute(['usuario' => $usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($contrasena, $user['contrasena'])) {
        // Guardar la sesión del usuario
        $_SESSION['usuario'] = $usuario;

        // Redirigir a la página principal de la plataforma
        header('Location: uneti.php');
        exit;
    } else {
        $_SESSION['error'] = "Usuario o contraseña incorrectos.";
        header('Location: inicio_sesion.php');
        exit;
    }
} else {
    $_SESSION['error'] = "Método no permitido.";
    header('Location: inicio_sesion.php');
    exit;
}
