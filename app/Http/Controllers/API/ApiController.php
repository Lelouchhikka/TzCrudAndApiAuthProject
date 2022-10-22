<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use function response;

class ApiController extends Controller
{
    public function getPostsbyCategory($id){
        $posts=Category::all()->where('id',$id)->first()->posts()->get()->toArray();
        if($posts!=null){
            return response()->json( [
                "status" => 1,
                "data" => $posts
            ]);
        }else {
            return response()->json([
                "status" => 0,
                "data" => "Нету новостей по этой рубреке"
            ]);
        }
    }
}
