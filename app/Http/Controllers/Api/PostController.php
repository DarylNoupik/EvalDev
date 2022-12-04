<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
Use App\Models\Post;

class PostController extends Controller
{
    public function show(){
      $post = Post::all();
        return response()->json($post);
    }

public function store(){


              $this->validate($request, [
                            'title' => 'bail|required|string|max:255',
                            "content" => 'bail|required',
                        ]);

                        // . On enregistre les informations du Post
                        $post=Post::create([
                            "title" => $request->title,
                            "content" => $request->content,
                        ]);

                        // 4. On retourne vers tous les posts : route("posts.index")
                        return response()->json($post);
    }

public function edit(){}

public function update($id){
    $post = Post::find($id);

    $this->validate($request, [
  'title' => 'bail|required|string|max:255',
  "content" => 'bail|required',
]);

    $post->update(["title" => $request->title,
        "content" => $request->content]);

    }

    public function destroy($id){
      $post = Post::find($id);
      $post->delete();
      return response()->json(["status" => "success"]);
    }

    public function UserPost(){}
}
