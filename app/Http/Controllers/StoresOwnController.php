<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalUpdateRequest;
use App\Models\Local;
use App\Models\Neighborhoods;
use App\Services\ImageService;
use Illuminate\Http\Request;
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
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View local with the id of $id and the neighborhood it belongs to.
	 */
	public function show($id)
	{
		$local = Local::with('neighborhood')->find($id);
		$neighborhoods = Neighborhoods::all();
		return view('sections.store-show', [
			'local' => $local,
			'neighborhoods' => $neighborhoods
		]);
	}
	
	public function update(LocalUpdateRequest $request, $id)
	{
		
		$request->validated();
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
		
		return redirect()->route('store.index')->with('success', 'Local actualizado correctamente');
	}
	
	public function delete($id)
	{
		$local = Local::with('neighborhood')->find($id);
		return view('sections.stores-delete', [
			'local' => $local
		]);
	}
}
