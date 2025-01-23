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
    <title>UNETI - Panel Principal</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/uneti.css">
</head>
<body class="d-flex">
    <nav class="sidebar">
        <div class="text-center mb-4">
            <img src="assets/images/uneti.png" alt="UNETI" class="img-fluid" style="max-width: 120px;">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#" id="inicioLink">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="tetrisLink">
                    <i class="fas fa-gamepad"></i> Tetris
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link text-danger" href="cerrar_sesion.php">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                </a>
            </li>
        </ul>
    </nav>

    <main class="content">
        <div id="inicio" class="section">
            <h1 class="mb-4">Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Panel Principal</h5>
                    <p class="card-text">Bienvenido a la plataforma UNETI.</p>
                </div>
            </div>
        </div>

        <div id="tetris" class="section tetris-container" style="display: none;">
            <h2 class="mb-4">Tetris</h2>
            <div class="row">
                <div class="col-md-8">
                    <canvas id="tetrisCanvas" width="300" height="600"></canvas>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Puntuación</h5>
                            <p class="card-text" id="score">0</p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Controles</h5>
                            <div class="controls">
                                <span class="badge bg-secondary">⬅️ Izquierda</span>
                                <span class="badge bg-secondary">➡️ Derecha</span>
                                <span class="badge bg-secondary">⬇️ Bajar</span>
                                <span class="badge bg-secondary">Q Rotar ↺</span>
                                <span class="badge bg-secondary">W Rotar ↻</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/tetris.js"></script>
</body>
</html>
