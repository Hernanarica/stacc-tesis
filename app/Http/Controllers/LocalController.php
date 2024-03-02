<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalRequest;
use App\Http\Requests\LocalStoreRequest;
use App\Http\Requests\LocalUpdateRequest;
use App\Models\Local;
use App\Models\Neighborhoods;
use App\Models\Opinion;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LocalController extends Controller
{
    /**
     * It will search for locals by name or neighborhood name, and paginate the results
     *
     * @param  Request  $request  request The request object.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View view with the locals and the search query.
     */
    public function index(Request $request)
    {
        if (empty($request->search)) {
            //traer todos los locales solo si son visibles
            $locals = Local::where('is_public', 1)->paginate(10);
        } else {
            $locals = Local::with('neighborhood')
                ->where('is_public', 1)
                ->where('name', 'like', '%'.$request->query('search').'%')
                ->orWhereHas('neighborhood', function ($query) use ($request) {
                    $query->where('name', 'like', '%'.$request->query('search').'%');
                })
                ->paginate(10);
        }

        return view('sections.locals', [
            'locals' => $locals,
            'search' => $request->query('search'),
        ]);
    }

    /**
     * Show the form for creating a new local
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $neighborhoods = Neighborhoods::all();

        return view('sections.register-local', [
            'neighborhoods' => $neighborhoods,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LocalRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LocalStoreRequest $request)
    {
        try {
            if ($request->hasFile('cover-photo')) {
                $coverPhoto = $request->file('cover-photo');
                $coverPhotoName = Str::uuid().'.'.$coverPhoto->getClientOriginalExtension();
                $coverPhoto->storeAs('', $coverPhotoName, 'public-images');
            }
            if ($request->hasFile('certificate')) {
                $certificate = $request->file('certificate');
                $certificateName = Str::uuid().'.'.$certificate->getClientOriginalExtension();
                $certificate->storeAs('', $certificateName, 'public-files');
            }

            $formData = $request->all();
            $formData['social-networks'] = [
                'facebook' => [
                    'name' => 'Facebook',
                    'url' => $formData['social-facebook'],
                ],
                'instagram' => [
                    'name' => 'Instagram',
                    'url' => $formData['social-instagram'],
                ],
                'tiktok' => [
                    'name' => 'TikTok',
                    'url' => $formData['social-tiktok'],
                ],
            ];
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
            $formData['cover-photo'] = $coverPhotoName;
            $formData['certificate'] = $certificateName;
            $formData['user_id'] = auth()->user()->id;

            Local::create([
                'user_id' => $formData['user_id'],
                'name' => $formData['name'],
                'street' => $formData['street'],
                'street-number' => $formData['street-number'],
                'phone' => $formData['phone'],
                'neighborhood_id' => $formData['neighborhood_id'],
                'map' => $formData['map'],
                'website' => $formData['website'],
                'description' => $formData['description'],
                'cover-photo' => $formData['cover-photo'],
                'certificate' => $formData['certificate'],
                'social-networks' => $formData['social-networks'],
                'schedules' => $formData['schedules'],
                'terms' => $formData['terms'] === 'on' ? 1 : 0,
            ]);

            return redirect()->route('locals.create')->with('success', 'Local creado correctamente');
        } catch (Exception $e) {
            return redirect()->route('locals.index')->with('error', 'Error al crear el local'.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Local  $local
     */
    public function show($local): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        //por medio del ID del local, se obtiene el local
        $local = Local::find($local);
        $opinions = Opinion::where('local_id', $local->id)->get();

        return view('sections.local-detail', [
            'local' => $local,
            'opinions' => $opinions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Local  $local
     * @return \Illuminate\Http\Response
     */
    public function edit($local)
    {
        //
    }

    public function update(LocalUpdateRequest $request, $id)
    {
        try {
            $request->validate((LocalUpdateRequest::rules()));
            $formData = $request->input();
            $local = Local::findOrFail($id);

            if ($request->hasFile('cover-photo')) {
                $image = new ImageService($request->image, public_path('uploads/images/local/'));
                $image->saveImage();

                $formData['cover-photo'] = $image->imageName;

                File::delete(public_path("uploads/images/local/{$local['cover-photo']}"));
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

            return redirect()->route('locals.index')->with('success', 'Local actualizado correctamente');
        } catch (Exception $e) {
            return redirect()->route('locals.index')->with('error', 'Error al actualizar el local');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        try {
            $locale = Local::find($id);

            if (! $locale) {
                throw new Exception('El local no existe');
            }

            $locale->delete();

            File::delete(public_path("uploads/images/local/{$locale->image}"));

            return redirect()->route('dashboard.locals.view')->with('success', 'Local eliminado correctamente');
        } catch (Exception $e) {
            return redirect()->route('dashboard.locals.view')->with('error', 'Error al eliminar el local');
        }
    }
}
