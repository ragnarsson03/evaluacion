<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanCalculatorController extends Controller
{
    public function show()
    {
        return view('loan.calculator');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
            'rate' => 'required|numeric|min:0',
            'years' => 'required|numeric|min:1|max:30'
        ]);

        $amount = $request->amount;
        $rate = $request->rate / 100 / 12;
        $payments = $request->years * 12;

        $monthly_payment = $amount * ($rate * pow(1 + $rate, $payments)) / (pow(1 + $rate, $payments) - 1);
        $total_payment = $monthly_payment * $payments;
        $total_interest = $total_payment - $amount;

        return back()->with([
            'monthly_payment' => number_format($monthly_payment, 2),
            'total_payment' => number_format($total_payment, 2),
            'total_interest' => number_format($total_interest, 2),
            'input' => $request->all()
        ]);
    }
}
