<?php
session_start();


$host = 'dpg-cu94id1opnds73aoq83g-a.oregon-postgres.render.com';
$dbname = 'evaluacion_7jrj';
$user = 'evaluacion_7jrj_user'; 
$password = 'Yx6sA5dfWqlxEubahSh8EhPOLyuyoxme'; 

try {
  
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

   
    if (empty($usuario) || empty($contrasena)) {
        $_SESSION['error'] = "Por favor, ingresa tu usuario y contraseña.";
        header('Location: inicio_sesion.php');
        exit;
    }

    
    $stmt = $pdo->prepare("SELECT * FROM registros WHERE usuario = :usuario");
    $stmt->execute(['usuario' => $usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($contrasena, $user['contrasena'])) {
      
        $_SESSION['usuario'] = $usuario;

  
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
