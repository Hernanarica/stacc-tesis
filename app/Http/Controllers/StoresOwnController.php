<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalUpdateRequest;
use App\Models\Local;
use App\Models\Neighborhoods;
use App\Services\ImageService;
use Illuminate\Support\Facades\File;

class StoresOwnController extends Controller
{
    //
    /**
     * It gets the logged in user's stores and sends them to the view
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View collection of all the locals that belong to the user.
     */
    public function index()
    {
        //obtener el id del usuario logueado y mandarle a la vista sus locales

        //		$locals = Local::where('id', auth()->user()->id)->get();
        $locals = Local::with('neighborhood')
            ->where('user_id', auth()->user()->id)->get();

        return view('sections.stores', [
            'locals' => $locals,
        ]);
    }

    /**
     * It gets the local with the id passed as a parameter and returns the view with the local
     *
     * @param id The id of the local you want to show.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View local with the id of $id and the neighborhood it belongs to.
     */
    public function show($id)
    {
        $local = Local::with('neighborhood')->find($id);
        $neighborhoods = Neighborhoods::all();

        return view('sections.store-show', [
            'local' => $local,
            'neighborhoods' => $neighborhoods,
        ]);
    }

    public function update(LocalUpdateRequest $request, $id)
    {
        try {
            $request->validated();
            $formData = $request->input();
            $local = Local::findOrFail($id);

            if ($request->hasFile('cover-photo')) {
                $image = new ImageService($request['cover-photo'], public_path('uploads/images/local/'));
                $image->saveImage();

                $formData['cover-photo'] = $image->imageName;

                File::delete(public_path("uploads/images/local/{$local['cover-photo'] }"));
            } else {
                $formData['cover-photo'] = $local['cover-photo'];
            }

            $formData['schedules'] = [
                'monday' => [
                    'day' => 'monday',
                    'opening-time' => $formData['monday-opening-time'],
                    'closing-time' => $formData['monday-closing-time'],
                ],
                'tuesday' => [
                    'day' => 'tuesday',
                    'opening-time' => $formData['tuesday-opening-time'],
                    'closing-time' => $formData['tuesday-closing-time'],
                ],
                'wednesday' => [
                    'day' => 'wednesday',
                    'opening-time' => $formData['wednesday-opening-time'],
                    'closing-time' => $formData['wednesday-closing-time'],
                ],
                'thursday' => [
                    'day' => 'thursday',
                    'opening-time' => $formData['thursday-opening-time'],
                    'closing-time' => $formData['thursday-closing-time'],
                ],
                'friday' => [
                    'day' => 'friday',
                    'opening-time' => $formData['friday-opening-time'],
                    'closing-time' => $formData['friday-closing-time'],
                ],
                'saturday' => [
                    'day' => 'saturday',
                    'opening-time' => $formData['saturday-opening-time'],
                    'closing-time' => $formData['saturday-closing-time'],
                ],
                'sunday' => [
                    'day' => 'sunday',
                    'opening-time' => $formData['sunday-opening-time'],
                    'closing-time' => $formData['sunday-closing-time'],
                ],
            ];

            //actualizar los datos de la redes sociales
            $formData['social-networks'] = [
                'facebook' => $formData['social-facebook'],
                'instagram' => $formData['social-instagram'],
                'tiktok' => $formData['social-tiktok'],
            ];

            $local->update($formData);

            $local->save();

            return redirect()->route('store.index')->with('success', 'Local actualizado correctamente');
        } catch (Exception $e) {
            return redirect()->route('store.index')->with('error', 'Error al actualizar el local');

        }
    }

    public function delete($id)
    {
        $local = Local::with('neighborhood')->find($id);

        return view('sections.stores-delete', [
            'local' => $local,
        ]);
    }
}
