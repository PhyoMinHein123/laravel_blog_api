<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
        return Post::all();
    }

    public function show($id){
        return Post::find($id);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return response()->json([
            'message' => 'Post updated successfully', 
            'post' => $post
        ], 200);
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return response()->json([
            'message' => 'Post deleted successfully', 
            'post' => $post
        ], 200);
    }
}
