<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
Use App\Models\Tag;
class AdminController extends Controller
{
    public function getData()
    {
        $question = Question::with('tag','answers')->skip(0)->take(10)->get(); 
        $tags = Tag::all();
        return view('home',['question'=>$question,'tags' => $tags]);
    }
    public function storeTag(Request $request)
    {
        Tag::create($request->all());
        return redirect('/home');
    }
    public function deleteQuestion($id)
    {
        Question::find($id)->delete();
        return redirect('/home');
    }
    public function deleteTag($id)
    {
        Tag::find($id)->delete();
        return redirect('/home');
    }
}
