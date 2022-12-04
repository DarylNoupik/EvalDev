<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
      $post = Post::all();
        return response()->json($post);
    }

public function store(Request $request){


              $this->validate($request, [
                            'title' => 'bail|required|string|max:255',
                            "content" => 'bail|required',
                        ]);

                        // . On enregistre les informations du Post
                    $post = Post::create([
                            "title" => $request->title,
                            "content" => $request->content,
                            "user_id" => $request->user_id,
                        ]);

                        // 4. On retourne vers tous les posts : route("posts.index")
                        return response()->json($post);
    }

public function edit(){}

public function update($id,Request $request){
    $post = Post::find($id);

    $this->validate($request, [
  'title' => 'bail|required|string|max:255',
  "content" => 'bail|required',
]);

    $post->update(["title" => $request->title,
        "content" => $request->content]);
return response()->json($post);
    }

    public function destroy($id){
      $post = Post::find($id);
      $post->delete();
      return response()->json(["status" => "success"]);
    }

    public function UserPost($id){
      $posts = Post::Where("user_id",$id)->get();
      return response()->json($posts);
    }
}
