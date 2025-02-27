<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Divisas - UNETI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .result-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
        }
        .conversion-result {
            font-size: 24px;
            color: #0d6efd;
            font-weight: bold;
        }
        .currency-icon {
            font-size: 24px;
            margin: 0 10px;
            color: #0d6efd;
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
                        <h4 class="mb-0"><i class="fas fa-exchange-alt me-2"></i>Conversor de Divisas</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('currency.convert') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="amount" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control @error('amount') is-invalid @enderror" 
                                           id="amount" name="amount" value="{{ old('amount', session('amount')) }}" 
                                           step="0.01" min="0" required>
                                    @error('amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="from_currency" class="form-label">De</label>
                                    <select class="form-select @error('from_currency') is-invalid @enderror" 
                                            id="from_currency" name="from_currency" required>
                                        @foreach($currencies as $code => $name)
                                            <option value="{{ $code }}" {{ session('from_currency') == $code ? 'selected' : '' }}>
                                                {{ $code }} - {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('from_currency')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="to_currency" class="form-label">A</label>
                                    <select class="form-select @error('to_currency') is-invalid @enderror" 
                                            id="to_currency" name="to_currency" required>
                                        @foreach($currencies as $code => $name)
                                            <option value="{{ $code }}" {{ session('to_currency') == $code ? 'selected' : '' }}>
                                                {{ $code }} - {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('to_currency')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-exchange-alt me-2"></i>Convertir
                            </button>
                        </form>

                        <div class="alert alert-info mt-3">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Tasa BCV:</strong> 1 USD = 64.24 VES
                            <small class="d-block mt-1">Fuente: Banco Central de Venezuela</small>
                            <small class="d-block mt-1">Actualizado a la fecha del 26/2/2025!</small>
                        </div>

                        @if(session('result'))
                            <div class="result-box">
                                <div class="mb-3">
                                    <span class="h5">{{ session('amount') }} {{ session('from_currency') }}</span>
                                    <i class="fas fa-arrow-right currency-icon"></i>
                                    <span class="conversion-result">{{ session('result') }} {{ session('to_currency') }}</span>
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