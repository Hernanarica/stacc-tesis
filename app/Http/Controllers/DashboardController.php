<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalUpdateRequest;
use App\Models\Local;
use App\Models\Neighborhoods;
use App\Models\Opinion;
use App\Models\User;
use App\Services\ImageService;
use http\Env\Request;
use Illuminate\Support\Facades\File;
use Resend\Laravel\Facades\Resend;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::all()->count();
        $localsCant = Local::all()->count();
        $opinionsCant = Opinion::all()->count();

        return view('sections.dashboard', [
            'usersCant' => $usersCount,
            'localsCant' => $localsCant,
            'opinionsCant' => $opinionsCant,
        ]);
    }

    public function usersView(\Illuminate\Http\Request $request)
    {
        if ($request->query('search') == null) {
            $users = User::paginate(10);
        } else {
            $users = User::where('name', 'like', '%'.$request->query('search').'%')
                ->orWhere('email', 'like', '%'.$request->query('search').'%')
                ->paginate(10);
        }

        return view('sections.dashboard-users', [
            'users' => $users,
        ]);
    }

    public function localsView(\Illuminate\Http\Request $request)
    {
        if ($request->query('search') == null) {
            $locals = Local::paginate(10);
        } else {
            $locals = Local::where('name', 'like', '%'.$request->query('search').'%')->paginate(10);
        }

        return view('sections.dashboard-locals', [
            'locals' => $locals,
        ]);
    }

    /**
     * It changes the status of a local.
     *
     * @param  local  $local  The name of the route parameter.
     */
    public function changeStatus(Local $local)
    {
        if ($local->is_public == 1) {
            $local->is_public = 0;
            $local->save();

            Resend::emails()->send([
                'from' => 'Stacc <staccwebsite@stacc.persianasfv.com>',
                'to' => [$local->user->email],
                'subject' => 'Stacc | Tu local fue inhabilitado',
                'html' => '
                      <div>
                          <p>' . $local->user->name . ' ' . $local->user->lastname . ' tu pedido fue recibido y tu local fue inhabilitado de forma exitosa, esperamos volver a ver tu local en stacc, saludos.</p>
                      </div> 
                  ',
            ]);
        } else {
            $local->is_public = 1;
            $local->save();

            Resend::emails()->send([
              'from' => 'Stacc <staccwebsite@stacc.persianasfv.com>',
              'to' => [$local->user->email],
              'subject' => 'Stacc | ¡Tu local fue habilitado!',
              'html' => '
                  <div>
                      <p>' . $local->user->name . ' ' . $local->user->lastname . ' ¡Felicidades! Tus datos fueron relevados y tu local fue habilitado de forma exitosa</p>
                      <a href="https://stacc.persianasfv.com/locals/' . $local->id .'" target="_blank">Visitar local</a>
                  </div> 
              ',
            ]);
        }

        return redirect()->route('dashboard.locals.view')->with('success', 'Local actualizado correctamente');
    }

    /**
     * It returns a view with the local object
     *
     * @param  id  $id  The id of the local you want to edit.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View view 'sections.dashboard-local-edit' is being returned.
     */
    public function localEdit($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $local = Local::with('neighborhood')->find($id);
        $neighborhoods = Neighborhoods::all();

        return view('sections.dashboard-local-edit', [
            'local' => $local,
            'neighborhoods' => $neighborhoods,
        ]);
    }

    /**
     * It validates the request, gets the form data, finds the local, checks if there's an image, if there is, it creates a
     * new image service, saves the image, adds the image name to the form data, deletes the old image, updates the local and
     * saves it
     *
     * @param  LocalUpdateRequest  $request  request The request object.
     * @param  id  $id  The id of the local to update
     * @return \Illuminate\Http\RedirectResponse view with the local data
     */
    public function updateLocal(LocalUpdateRequest $request, $id)
    {
        try {
            $request->validated();
            //			$request->validate(LocalUpdateRequest::rules(), LocalUpdateRequest::messages());
            $formData = $request->input();
            $local = Local::findOrFail($id);

            if ($request->hasFile('image')) {
                $image = new ImageService($request->image, public_path('uploads/images/local'));
                $image->saveImage();

                $formData['image'] = $image->imageName;

                File::delete(public_path("uploads/images/local/{$local->image}"));
            } else {
                $formData['image'] = $local->image;
            }

            $local->update($formData);

            $local->save();

            return redirect()->route('dashboard.locals.view')->with('success', 'Local actualizado correctamente');
        } catch (Exception $e) {
            return redirect()->route('dashboard.locals.view')->with('error', 'Error al actualizar el local');
        }
    }
}
