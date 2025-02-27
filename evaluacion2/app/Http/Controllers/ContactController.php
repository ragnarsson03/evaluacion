<?php

namespace App\Http\Controllers;  // Corregido: quitamos Auth\

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.form');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'department' => 'required|string'
        ]);

        // Aquí iría la lógica para enviar el correo o guardar en base de datos
        
        return back()->with('success', 'Mensaje enviado exitosamente. Nos pondremos en contacto pronto.');
    }
}
