<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Reservas - UNETI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-list me-2"></i>Listado de Reservas
                </h5>
                <a href="{{ route('hotel.form') }}" class="btn btn-light">
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
                                <th>Huéspedes</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->id }}</td>
                                    <td>{{ $reservation->name }}</td>
                                    <td>{{ $reservation->check_in->format('d/m/Y') }}</td>
                                    <td>{{ $reservation->check_out->format('d/m/Y') }}</td>
                                    <td>
                                        @switch($reservation->room_type)
                                            @case('single')
                                                Individual
                                                @break
                                            @case('double')
                                                Doble
                                                @break
                                            @case('suite')
                                                Suite
                                                @break
                                            @case('family')
                                                Familiar
                                                @break
                                        @endswitch
                                    </td>
                                    <td>{{ $reservation->guests }}</td>
                                    <td>
                                        <span class="badge {{ $reservation->status == 'confirmada' ? 'bg-success' : 'bg-warning' }}">
                                            {{ ucfirst($reservation->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('hotel.edit', $reservation->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('hotel.destroy', $reservation->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No hay reservas registradas</td>
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