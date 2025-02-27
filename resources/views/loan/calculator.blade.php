<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Préstamos - UNETI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .result-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        .result-item {
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }
        .result-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-home me-2"></i>Dashboard
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="fas fa-calculator me-2"></i>Calculadora de Préstamos</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('loan.calculate') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="amount" class="form-label">Monto del Préstamo ($)</label>
                                <input type="number" class="form-control @error('amount') is-invalid @enderror" 
                                       id="amount" name="amount" value="{{ old('amount', session('input.amount')) }}" 
                                       step="0.01" min="1" required>
                                @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="rate" class="form-label">Tasa de Interés Anual (%)</label>
                                <input type="number" class="form-control @error('rate') is-invalid @enderror" 
                                       id="rate" name="rate" value="{{ old('rate', session('input.rate')) }}" 
                                       step="0.01" min="0" required>
                                @error('rate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="years" class="form-label">Plazo (Años)</label>
                                <input type="number" class="form-control @error('years') is-invalid @enderror" 
                                       id="years" name="years" value="{{ old('years', session('input.years')) }}" 
                                       min="1" max="30" required>
                                @error('years')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-calculator me-2"></i>Calcular
                            </button>
                        </form>

                        @if(session('monthly_payment'))
                            <div class="result-box">
                                <h5 class="text-primary mb-3">Resultados del Cálculo</h5>
                                <div class="result-item">
                                    <strong>Pago Mensual:</strong> 
                                    <span class="float-end">${{ session('monthly_payment') }}</span>
                                </div>
                                <div class="result-item">
                                    <strong>Pago Total:</strong> 
                                    <span class="float-end">${{ session('total_payment') }}</span>
                                </div>
                                <div class="result-item">
                                    <strong>Total Intereses:</strong> 
                                    <span class="float-end">${{ session('total_interest') }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>