<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function createPost(Request $request){
        $data = $request->all();

        $post = new Post();
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->url_image = $data['url_image'];

        $post->save();
        $post->comment();

        $status = "success creating data post";
        return response()->json(compact('post', 'status'), 200);
    }

    public function getPost(Post $post){
        $post->comment;
        return response()->json(compact('post'), 200);
    }

    public function updatePost(Request $request, Post $post){
        $data = $request->all();

        //jika title ada dan tidak kosong
        if(isset($data['title']) && !empty($data['title'])){
            $post->title = $data['title'];
        }

        //jika description ada
        if(isset($data['description'])){
            $post->description = $data['description'];
        }

        //jika postingan ada dan tidak kosong
        if(isset($data['url_image']) && !empty($data['url_image'])){
            $post->url_image = $data['url_image'];
        }
        
    }
}
