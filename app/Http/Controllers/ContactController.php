<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(Request $request) {
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required'
        ],[
            'email.required' => 'El email es obligatorio',
            'name.required' => 'Tu nombre es obligatorio',
            'message.required' => 'Tu mensaje es obligatorio',
            'phone.required' => 'Tu teléfono es obligatorio'
        ]);

        $result = Contact::create($data);
        return redirect()->route('message')->with('success', $result ? 'Mensaje enviado con éxito' : 'No se ha podido enviar. Prueba más tarde');
    }
}


