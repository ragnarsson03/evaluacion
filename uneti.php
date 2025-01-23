<?php 
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: inicio_sesion.php');  // Redirigir al inicio de sesión si no está autenticado
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="css/uneti.css">
    <link rel="shortcut icon" href="images/uneti.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos para el juego de Tetris */
        .tetris-container {
            display: none;
            text-align: center;
        }
        canvas {
            border: 1px solid #000;
        }
    </style>
</head>
<body>

    <!-- Barra lateral de navegación -->
    <aside class="sidebar">
        <ul class="menu-list">
            <li><a href="#" id="inicioLink"><i class="fas fa-house-user"></i> Inicio</a></li>
            <li><a href="#" id="tetrisLink"><i class="fas fa-file-upload"></i> Juego Tetris</a></li>
            <li><a href="cerrar_sesion.php" class="logout-button"><i class="fas fa-right-from-bracket"></i> Cerrar Sesión</a></li>
        </ul>
    </aside>
    
    <!-- Contenido principal -->
    <div class="content">
        <!-- Sección de Inicio -->
        <div id="inicio" class="section">
            <div class="inicio-header">
                <img src="images/uneti.png" alt="Logo UNETI" class="uneti-logo">
                <h1>Bienvenido</h1>
                <p class="usuario-info">Usuario: <?php echo $_SESSION['usuario']; ?></p>
            </div>
            <div class="inicio-welcome">
                <p>Utilice el menú lateral para acceder a las distintas funcionalidades de la plataforma.</p>
            </div>
        </div>

        <!-- Sección de Tetris -->
        <div id="tetris" class="section tetris-container">
            <h1>Juego de Tetris</h1>
            <canvas id="tetrisCanvas" width="300" height="600"></canvas>
            <p>Puntuación: <span id="score">0</span></p>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.getElementById('inicioLink').addEventListener('click', function() {
            document.getElementById('inicio').style.display = 'block';
            document.getElementById('tetris').style.display = 'none';
        });

        document.getElementById('tetrisLink').addEventListener('click', function() {
            document.getElementById('inicio').style.display = 'none';
            document.getElementById('tetris').style.display = 'block';
        });
    </script>
    <script src="js/tetris.js"></script>
</body>
</html>
