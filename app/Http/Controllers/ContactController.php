<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;
use Resend\Laravel\Facades\Resend;

class ContactController extends Controller
{
    public function index()
    {
        return view('sections.contact');
    }

    public function store(Request $request)
    {
        Resend::emails()->send([
            'from' => 'Stacc <contact.stacc@stacc.persianasfv.com>',
            'to' => ['hernodev@gmail.com', 'hernanaricammm@gmail.com'],
            'subject' => 'Contacto Stacc',
            'html' => '
                <div>
                    <h3>' . $request->name . ' quiere contactarse:</h3>
                    <ul>
                        <li>Nombre: ' . $request->name . '</li>
                        <li>Teléfono: ' . $request->phone . '</li>
                        <li>Email: ' . $request->email . '</li>
                        <li>Mensaje: ' . $request->message . '</li>
                    </ul>
                </div> 
            ',
        ]);

        return to_route('home.index')->with('success', 'Email enviado! Pronto nos comunicaremos.');
    }
}
