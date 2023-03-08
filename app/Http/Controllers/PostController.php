<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'posts' =>Post::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //create post
        $post = new Post;
        $post ->name = $request->name;
        $post ->description = $request->description;

        $post->save();

        return response()->json([
            'message' =>'post created',
            'status' =>'success',
            'data' =>$post, //return post data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //single post show
        return response()->json(['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post ->name = $request->name;
        $post ->description = $request->description;

        $post->save();

        return response()->json([
            'message' =>'post Update',
            'status' =>'success',
            'data' =>$post, //return post data
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message'=>'deleted','status'=>'success']);
    }
}
