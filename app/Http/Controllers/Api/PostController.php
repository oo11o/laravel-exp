<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){

        $posts = Post::when($request->filled('category_id'), function ($query){
            $query->where('category_id', request('category_id'));
        })->paginate(10);

        return PostResource::collection($posts);
    }
}
