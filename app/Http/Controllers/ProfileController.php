<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('sections.profile', [
            'user' => $user,
        ]);
    }

    /**
     * It returns a view called `edit-profile` and passes the `user` variable to it
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View edit view is being returned.
     */
    public function edit()
    {
        $user = auth()->user();

        return view('sections.profile-edit', [
            'user' => $user,
        ]);
    }

    public function update(UserUpdateRequest $request)
    {
        $user = auth()->user();

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
            'image_alt' => $image->imageAlt ?? $user->image_alt,
            'category' => $request->category,
        ]);

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Usuario actualizado correctamente');
    }
    //
}
