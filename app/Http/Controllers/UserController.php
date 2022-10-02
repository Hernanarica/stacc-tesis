<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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
	 * Store a newly created resource in storage.
	 *
	 * @param UserRequest $request
	 * @return JsonResponse
	 */
	public function store(UserRequest $request)
	{
		try {
			if ($request->hasFile('image')) {
				$image = new ImageService($request->image, public_path('uploads/images/profile'));
				$image->saveImage();
			}
			
			$user = User::create([
				'role_id'  => $request->role_id,
				'name'     => $request->name,
				'lastname' => $request->lastname,
				'image'    => $image->imageName ?? null,
				'email'    => $request->email,
				'password' => Hash::make($request->password)
			]);
			
			return response()->json([
				'status' => 'success',
				'data'   => $user
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
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param User $user
	 * @return JsonResponse
	 */
	public function update(Request $request, User $user)
	{
		try {
//			TODO: Crear Request para UserUpdate.
			
			if ($request->hasFile('image')) {
				$image = new ImageService($request->image, public_path('uploads/images/profile'));
				$image->saveImage();
				
				File::delete(public_path("uploads/images/profile/{$user->image}"));
			}
			
			$user->update([
				'role_id'  => $request->role_id,
				'name'     => $request->name,
				'lastname' => $request->lastname,
				'image'    => $image->imageName ?? $user->image,
			]);
			
			$user->save();
			
			return response()->json([
				'status' => 'success',
				'data'   => $user
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
	 * @param User $user
	 * @return JsonResponse
	 */
	public function destroy(User $user)
	{
		try {
//			TODO: Crear Request para UserDelete.
			$user->delete();
			
			File::delete(public_path("uploads/images/profile/{$user->image}"));
			
			return response()->json([
				'status' => 'success',
				'data'   => $user
			]);
			
		} catch (Exception $e) {
			return response()->json([
				'Exception' => $e->getMessage(),
				'File'      => $e->getFile(),
				'Line'      => $e->getLine(),
			]);
		}
	}
}
