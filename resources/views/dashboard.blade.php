<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - UNETI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #1a237e;
            position: fixed;
            left: 0;
            top: 0;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .nav-link {
            color: #fff !important;
            padding: 10px 20px;
        }
        .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .logo-container {
            padding: 20px;
            text-align: center;
        }
        .logo-container img {
            max-width: 120px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('images/uneti-logo.png') }}" alt="UNETI" class="img-fluid">
            <h6 class="text-white mt-2">Panel de Control</h6>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-home me-2"></i>Inicio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact.form') }}">
                    <i class="fas fa-envelope me-2"></i>Contacto
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('hotel.form') }}">
                    <i class="fas fa-hotel me-2"></i>Reserva Hotel
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('loan.calculator') }}">
                    <i class="fas fa-calculator me-2"></i>Calculadora Préstamos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('currency.converter') }}">
                    <i class="fas fa-exchange-alt me-2"></i>Conversor Divisas
                </a>
            </li>
            <li class="nav-item mt-4">
                <a class="nav-link text-danger" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                </a>
            </li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <h2 class="mb-4">Bienvenido al Sistema</h2>

        <!-- Tarjetas de acceso rápido -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-hotel me-2"></i>Reservas</h5>
                        <p class="card-text">Gestiona tus reservas de hotel de manera sencilla.</p>
                        <a href="{{ route('hotel.form') }}" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-calculator me-2"></i>Préstamos</h5>
                        <p class="card-text">Calcula las cuotas de tu préstamo.</p>
                        <a href="{{ route('loan.calculator') }}" class="btn btn-success">Calcular</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-exchange-alt me-2"></i>Divisas</h5>
                        <p class="card-text">Convierte entre diferentes monedas.</p>
                        <a href="{{ route('currency.converter') }}" class="btn btn-info">Convertir</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de últimas reservas -->
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-list me-2"></i>Últimas Reservas</h5>
                <a href="{{ route('hotel.form') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-plus me-2"></i>Nueva Reserva
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Huésped</th>
                                <th>Entrada</th>
                                <th>Salida</th>
                                <th>Habitación</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->id }}</td>
                                    <td>{{ $reservation->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($reservation->check_in)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($reservation->check_out)) }}</td>
                                    <td>{{ ucfirst($reservation->room_type) }}</td>
                                    <td>
                                        <span class="badge {{ $reservation->status == 'confirmada' ? 'bg-success' : 'bg-warning' }}">
                                            {{ ucfirst($reservation->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <form action="{{ route('hotel.destroy', $reservation->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas cancelar esta reserva?')">
                                                    <i class="fas fa-times"></i> Cancelar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No hay reservas registradas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>