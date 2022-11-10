<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalRequest;
use App\Http\Requests\LocalUpdateRequest;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Local;


class LocalController extends Controller
{
	/**
	 * It returns a view called "sections.locals" with a variable called "locales" that contains all the locales in the
	 * database
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View view with the name of 'sections.locals' and an array with the key 'locales' and the value of $locales.
	 */
	public function index(Request $request)
	{
		$texto = trim($request->get('texto'));
//		$locales = Local::all();
		$locals = DB::table('locals')
			->select('locals.*')
			->where('name', 'LIKE', '%' . $texto . '%')
			->orderBy('name', 'asc');
		return view('sections.locals', compact('locals', 'texto'));
//		return view('sections.locals', ['locals' => $locals->paginate(10), 'texto' => $texto]);
		
//		return view('sections.locals', ['locales' => $locales]);
	}
	
	/**
	 * Show the form for creating a new local
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function create()
	{
		return view('sections.register-local');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param LocalRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(LocalRequest $request)
	{
		try {
			
			if ($request->hasFile('image')) {
				$image = new ImageService($request->image, public_path('uploads/images/local'));
				$image->saveImage();
			}
			
			$formData = $request->input();
			$formData[ 'image' ] = $image->imageName ?? null;
			
			//obtener el user id con laravel permission
			$formData[ 'user_id' ] = auth()->user()->id;

			$local = Local::create([
				"user_id"      => $formData[ 'user_id' ],
				"name"         => $formData[ 'name' ],
				"address"      => $formData[ 'address' ],
				"opening_time" => $formData[ 'opening_time' ],
				"closing_time" => $formData[ 'closing_time' ],
				"url_site"     => $formData[ 'url_site' ],
				"phone"        => $formData[ 'phone' ],
				"url_map"      => $formData[ 'url_map' ],
				"terms"        => $formData[ 'terms' ],
				"image_alt"    => $formData[ 'image_alt' ],
				"image"        => $formData[ 'image' ],
			]);
			
			return redirect()->route('locals.index')->with('success', 'Local creado correctamente');
			
		} catch (Exception $e) {
			return redirect()->route('locals.index')->with('error', 'Error al crear el local');
		}
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param Local $local
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function show($local): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
	{
		//por medio del ID del local, se obtiene el local
		$local = Local::find($local);
		
		return view('sections.local-detail', [
			'local' => $local
		]);
		
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Local $local
	 * @return \Illuminate\Http\Response
	 */
	public function edit($local)
	{
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param LocalUpdateRequest $request
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(LocalUpdateRequest $request, $id)
	{
		try {
//		$request->validate((LocalUpdateRequest::rules()), LocalUpdateRequest::messages());
			$formData = $request->input();
			$local    = Local::findOrFail($id);
			
			if ($request->hasFile('image')) {
				
				$image = new ImageService($request->image, public_path('uploads/images/local'));
				$image->saveImage();
				
				$formData[ 'image' ] = $image->imageName;
				
				File::delete(public_path("uploads/images/local/{$local->image}"));
				
			} else {
				$formData[ 'image' ] = $local->image;
			}
			
			$local->update($formData);
			
			$local->save();
			
			return response()->json([
				'status' => 'success',
				'data'   => $local
			]);
			
		} catch (Exception $e) {
			return response()->json([
				'Exception' => $e->getMessage(),
				'File'      => $e->getFile(),
				'Line'      => $e->getLine(),
			]);
		}
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Local $local
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy(Local $local)
	{
		try {
			
			$locale = Local::find($local->id);
			
			if (!$locale) throw new Exception('El local no existe');
			
			$locale->delete();
			
			File::delete(public_path("uploads/images/local/{$locale->image}"));
			
			return response()->json([
				'status' => 'success',
				'data'   => $locale,
			], 200);
			
		} catch (Exception $e) {
			return response()->json($e->getMessage(), 400);
		}
	}
}