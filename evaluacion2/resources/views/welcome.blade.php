<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNETI - Sistema de Evaluación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #003366 50%, #ffffff 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }
        .logo-container img {
            max-width: 200px;
            margin-bottom: 1rem;
        }
        .university-title {
            color: #ffffff;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .info-box {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 2rem;
        }
        .action-button {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            border-radius: 30px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.2s;
        }
        .action-button:hover {
            transform: translateY(-3px);
        }
        .welcome-text {
            font-size: 1.2rem;
            line-height: 1.6;
            text-align: center;
            color: #444;
            margin-bottom: 2rem;
        }
        .features-list {
            margin-top: 2rem;
            padding: 1rem;
            background: rgba(0, 51, 102, 0.05);
            border-radius: 10px;
        }
        .features-title {
            color: #003366;
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.4rem;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }
        .feature-item {
            background: white;
            padding: 1.2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        .feature-item:hover {
            transform: translateY(-2px);
        }
        .feature-title {
            color: #003366;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        .feature-text {
            color: #666;
            font-size: 0.9rem;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="logo-container">
                        <img src="{{ asset('images/uneti-logo.png') }}" alt="UNETI Logo" class="img-fluid">
                        <h1 class="university-title">Universidad Nacional Experimental de las Telecomunicaciones e Informática</h1>
                    </div>
                    
                    <div class="info-box">
                        <p class="welcome-text">
                            UNETI avanza en planes de formación en el área de las criptomonedas, 
                            consolidándose como la primera universidad del país especializada en el estudio de la blockchain.
                        </p>
                        
                        <div class="features-list">
                            <h2 class="features-title">Funcionalidades Disponibles</h2>
                            <div class="features-grid">
                                <div class="feature-item">
                                    <h3 class="feature-title">Registro de Usuario</h3>
                                    <p class="feature-text">Crea una cuenta para acceder a todas las funcionalidades del sistema.</p>
                                </div>
                                <div class="feature-item">
                                    <h3 class="feature-title">Formulario de Contacto</h3>
                                    <p class="feature-text">Envía tus consultas y comentarios directamente a nuestro equipo.</p>
                                </div>
                                <div class="feature-item">
                                    <h3 class="feature-title">Reserva de Hotel</h3>
                                    <p class="feature-text">Gestiona reservaciones en hoteles asociados de manera sencilla.</p>
                                </div>
                                <div class="feature-item">
                                    <h3 class="feature-title">Cálculo de Préstamo</h3>
                                    <p class="feature-text">Calcula cuotas y simula diferentes escenarios de préstamos.</p>
                                </div>
                                <div class="feature-item">
                                    <h3 class="feature-title">Registro de Producto</h3>
                                    <p class="feature-text">Administra el inventario y gestiona productos del sistema.</p>
                                </div>
                                <div class="feature-item">
                                    <h3 class="feature-title">Calculadora de Divisas</h3>
                                    <p class="feature-text">Convierte entre diferentes monedas con tasas actualizadas.</p>
                                </div>
                            </div>
                        </div>

                        <div class="action-buttons">
                            @auth
                                <a href="{{ route('dashboard') }}" class="btn btn-primary action-button">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard
                                </a>
                                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger action-button">
                                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary action-button">
                                    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                                </a>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary action-button">
                                    <i class="fas fa-user-plus"></i> Registrarse
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>