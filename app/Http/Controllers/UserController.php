<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * It creates a new user, assigns a role to it, and returns a view with a success message
     *
     * @param UserRequest request The request object.
     * @return \Illuminate\Http\RedirectResponse view with a success message
     */
    public function store(UserRequest $request)
    {
        try {
            if ($request->hasFile('image')) {
                $image = new ImageService($request->image, public_path('uploads/images/profile'));
                $image->saveImage();
            }

            $user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'image' => $image->imageName ?? null,
                'email' => $request->email,
                'category' => $request->category,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole($request->category);

            return redirect()->route('home.index')->with('success', 'Usuario registrado con éxito');
        } catch (Throwable $e) {
            return redirect()->route('home.index')->with('error', 'Error al crear el usuario');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateUser(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        $request->validated();

        if ($request->hasFile('image')) {
            $image = new ImageService($request->image, public_path('uploads/images/profile'));
            $image->saveImage();

            File::delete(public_path("uploads/images/profile/{$user->image}"));
        }
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'image' => $image->imageName ?? $user->image,
            'category' => $request->category,
        ]);

        $user->save();

        return redirect()->route('dashboard.users.view')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * It finds the user by the id, deletes the image from the public folder, deletes the user from the database, and
     * redirects the user back to the view page with a success message
     *
     * @param  id  $id  The id of the user to be deleted.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        File::delete(public_path("uploads/images/profile/{$user->image}"));
        $user->delete();

        return redirect()->route('dashboard.users.view')->with('success', 'Usuario fue borrado correctamente');
    }

    /**
     * This function is used to edit a user
     *
     * @param id The id of the user we want to edit.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View editUser function is returning the view of the edit page for the user with the id that is passed in.
     */
    public function editUser($id)
    {
        $user = User::find($id);

        return view('sections.dashboard-user-edit', [
            'user' => $user,
        ]);
    }
}
