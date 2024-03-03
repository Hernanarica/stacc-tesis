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
            'from' => 'Stacc <stacccontact@stacc.persianasfv.com>',
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

    public function disable(Request $request, Local $local)
    {
        Resend::emails()->send([
            'from' => 'Stacc <stacccontact@stacc.persianasfv.com>',
            'to' => ['hernodev@gmail.com', 'hernanaricammm@gmail.com'],
            'subject' => 'Stacc | Solicitud de baja',
            'html' => '
                <div>
                    <p><b>' . auth()->user()->name . ' ' . auth()->user()->lastname . '</b> esta solicitando la inhabilitación de su local: ' . $local->name . ' </p>
                    <p><b>Motivo:</b></p>
                    <p>' . $request->message .'</p>
                </div> 
            ',
        ]);

        return to_route('home.index')->with('success', 'Email enviado! Pronto nos comunicaremos.');
    }
}
