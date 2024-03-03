<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpinionStoreRequest;
use App\Models\Opinion;

class OpinionController extends Controller
{
    public function store(OpinionStoreRequest $request)
    {
        Opinion::create([
            'user_id' => $request->user_id,
            'local_id' => $request->local_id,
            'title' => $request->title,
            'score' => $request->score,
            'opinion' => $request->opinion,
            'current_date' => $request->current_date,
        ]);

        return redirect()->back()->with('success', 'Opinión agregada correctamente.');
    }
}
