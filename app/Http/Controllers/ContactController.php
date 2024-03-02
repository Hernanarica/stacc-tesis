<?php

namespace App\Http\Controllers;

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
          'from' => 'stacc@gmail.com',
          'to' => 'hernodev@gmail.com',
          'subject' => 'Info Stacc',
          'html' => '<p>Congrats on sending your <strong>first email</strong>!</p>'
        ]);

        return to_route('home.index');
    }
}
