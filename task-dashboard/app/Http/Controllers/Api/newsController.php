<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class newsController extends Controller
{
    use ApiResponseData;
    //show all news
    public function show(){
        $news=NewsResource::collection(News::all());
        return $this->tamplateApidata('all news',200,$news);
    }

    //show one new by get the id of this news
    public function showOne(Request $request){
        if($request->id){
            $id=(int)$request->id;
            $news=News::find($id);
            return $this->tamplateApidata('show one news',200,new NewsResource($news));
        }else{
            return $this->tamplateApidata('the id of news not receive from client view',404);
        }
    }
}
