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
            'from' => 'Stacc <staccwebsite@stacc.persianasfv.com>',
            'to' => ['stacc.contact@gmail.com'],
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
            'from' => 'Stacc <staccwebsite@stacc.persianasfv.com>',
            'to' => ['stacc.contact@gmail.com'],
            'subject' => 'Stacc | Solicitud de baja',
            'html' => '
                <div>
                    <p><b>' . auth()->user()->name . ' ' . auth()->user()->lastname . '</b> está solicitando la inhabilitación de su local: ' . $local->name . ' </p>
                    <p><b>Motivo:</b></p>
                    <p>' . $request->reason .'</p>
                    
                    <a href="https://stacc.persianasfv.com/panel/locales" target="_blank">Inhabilitar' . $local->name .'</a>
                </div> 
            ',
        ]);

        return to_route('home.index')->with('success', 'Email enviado! Pronto nos comunicaremos.');
    }
}
