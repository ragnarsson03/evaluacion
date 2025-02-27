<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = []; // Aquí iría la lógica para obtener productos de la base de datos
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string'
        ]);

        // Aquí iría la lógica para guardar en la base de datos

        return redirect()->route('products.index')->with('success', 'Producto registrado exitosamente');
    }
}
