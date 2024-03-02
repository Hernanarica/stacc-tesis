<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
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
     * @return JsonResponse
     */
    public function store(PostRequest $request)
    {
        try {
            $post = Post::create([
                'title' => $request->title,
                'comment' => $request->comment,
                'user_id' => $request->user_id,
            ]);

            return response()->json($post, 201);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(PostRequest $request)
    {
        try {
            $post = Post::find($request->id);

            if (! $post) {
                throw new Exception('El post no existe');
            }

            $post->update([
                'title' => $request->title,
                'comment' => $request->comment,
                'user_id' => $request->user_id,
            ]);

            $post->save();

            return response()->json([
                'status' => 'success',
                'post' => $post,
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        try {
            $post = Post::find($request->id);

            if (! $post) {
                throw new Exception('El post no existe');
            }

            $post->delete();

            return response()->json([
                'status' => 'success',
                'post' => $post,
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
}
