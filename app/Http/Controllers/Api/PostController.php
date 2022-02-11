<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){


        $sortField = $request->query('sort_field');
        $sortDirection = $request->query('sort_direction');

        //check data for sorting
        if(!in_array($sortField, ['title','post_text','created_at'])){
            $sortField = 'created_at';
        }
        if(!in_array($sortDirection, ['asc', 'desc'])){
            $sortDirection =  'desc';
        }
        
        $posts = Post::when($request->filled('category_id'), function ($query){
            $query->where('category_id', request('category_id'));
        })->orderBy($sortField,$sortDirection)->paginate(10);

        return PostResource::collection($posts);
    }
}
