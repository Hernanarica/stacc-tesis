<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalRequest;
use App\Http\Requests\LocalUpdateRequest;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;
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
	public function index()
	{
		$locals = Local::all()->where('is_public', '=', '1');
		
		return view('sections.locals', [
			'locals' => $locals
		]);
	}
	
	
	/**
	 * Show the form for creating a new local
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param LocalRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(LocalRequest $request)
	{
		try {
			
			if ($request->hasFile('image')) {
				$image = new ImageService($request->image, public_path('uploads/images/local'));
				$image->saveImage();
			}
			
			$formData = $request->input();
			$formData['image'] = $image->imageName ?? null;
			
			$local = Local::create($formData);
			
			return response()->json([
				'status'  => 'success',
				'data'    => $local
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
			$local = Local::findOrFail($id);
			
			if($request->hasFile('image')) {
				
				$image = new ImageService($request->image, public_path('uploads/images/local'));
				$image->saveImage();
				
				$formData['image'] = $image->imageName;
				
				File::delete(public_path("uploads/images/local/{$local->image}"));
				
			}else{
				$formData['image'] = $local->image;
			}
			
			$local->update($formData);
			
			$local->save();
			
			return response()->json([
				'status' => 'success',
				'data'   => $local
			]);
			
		}catch (Exception $e) {
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
