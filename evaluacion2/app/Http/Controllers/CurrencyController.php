<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    private $currencies = [
        'USD' => 'Dólar Estadounidense',
        'EUR' => 'Euro',
        'GBP' => 'Libra Esterlina',
        'JPY' => 'Yen Japonés',
        'VES' => 'Bolívar Digital',
        'CNY' => 'Yuan Chino'
    ];

    public function show()
    {
        return view('currency.converter', ['currencies' => $this->currencies]);
    }

    private $rates = [
        'USD' => 1.00,
        'EUR' => 0.85,
        'GBP' => 0.73,
        'JPY' => 110.0,
        'VES' => 64.24,  // Actualizado según BCV
        'CNY' => 6.45
    ];

    public function convert(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'from_currency' => 'required|string',
            'to_currency' => 'required|string'
        ]);

        $amount = $request->amount;
        $from = $request->from_currency;
        $to = $request->to_currency;

        // Si la conversión involucra VES, usamos la tasa del BCV
        if ($from === 'VES' && $to === 'USD') {
            $result = $amount / 64.24;
        } elseif ($from === 'USD' && $to === 'VES') {
            $result = $amount * 64.24;
        } else {
            // Para otras monedas, convertimos a USD primero
            $usd_amount = $amount / $this->rates[$from];
            $result = $usd_amount * $this->rates[$to];
        }

        return back()->with([
            'result' => number_format($result, 2),
            'from_currency' => $from,
            'to_currency' => $to,
            'amount' => $amount,
            'currencies' => $this->currencies,
            'bcv_rate' => 64.24
        ]);
    }
}
