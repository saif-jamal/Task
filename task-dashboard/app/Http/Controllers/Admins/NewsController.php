<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    //show  page of info
    public function index(){
        $news=News::all();
        return view('Dashboard.News.news',['news'=>$news]);
    }


    //view
    public function view($id){
        $news=News::findOrFail($id);
        return view('Dashboard.News.newsview',['news'=>$news]);
    }

    //create
    public function create(){
        return view('Dashboard.News.create');
    }


    //store
    public function store(NewsRequest $request){

        //save image or pdf file
        $image="";
        if($request->hasFile('image')){
            $image = "news_" . time() . '_' . rand(0, 1000) . '.' . $request['image']->extension();
            $request['image']->move(public_path('/news/img/'), $image);
        }

        News::create([
            'newsHeadline'=>$request->newsHeadline,
            'content'=>$request['content'],
            'image'=>$image
        ]);

        return redirect()->route('news')->with(['create_news'=>'news added success']);

    }

    //edit
    public function edit($id){
        $news=News::findOrFail($id);

        return view('Dashboard.News.update',['news'=>$news]);
    }

    //update
    public function update(Request $request){
        $news=News::findOrFail($request->news_id);

        //save image or pdf file
        $image=$news->image;

        if($request->hasFile('image')){

            if (File::exists(public_path('/news/img/' . $news->image))) {
                File::delete(public_path('/news/img/' . $news->image));
            }

            $image = "news_" . time() . '_' . rand(0, 1000) . '.' . $request['image']->extension();
            $request['image']->move(public_path('/news/img/'), $image);

        }

        $news->update([
            'newsHeadline'=>$request->newsHeadline,
            'content'=>$request['content'],
            'image'=>$image,
        ]);

        return redirect()->route('news')->with(['news_updated'=>'updated successfully']);
    }

    //delete
    public function delete($id){
        $news=News::findOrFail($id);


        if (File::exists(public_path('/news/img/' . $news->image))) {
            File::delete(public_path('/news/img/' . $news->image));
        }


        $news->delete();
        return redirect()->route('news')->with(['news_deleted'=>'done!']);

    }



}
