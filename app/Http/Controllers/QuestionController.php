<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Question;
class QuestionController extends Controller
{
    public function index()     
    {
      return Question::with('tag')->get();
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'tag' => 'required',
        ]);
        $question = $request->user()->Question()->create([
            'title' => $request->json('title'),
            'body' => $request->json('body'),
        ]);
        $tag=$request->json('tag');
        $question->tag()->sync($tag);
        if ($question) {
    		$res = array(
    			'status' => true
    		);
    	}else{
			$res = array(
    			'status' => false
    		);
    	}
    	return response()->json($res);
    }
    public function show($id)
    {
        $question = Question::with('answers','tag')->where('id',$id)->first();
        if(!$question){
            return response()->json(['error' => 'id tidak di temukan'],404);
        }
        return $question;
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'tag_id' => 'required',
        ]);
        $question = Question::find($id);
        
        if($request->user()->id != $question->user_id){
            return response()->json(['error' => 'tidak boleh mengedit forum']);
        }

        $question->title = $request->title;
        $question->body = $request->body;
        $question->tag_id = $request->tag_id;
        $question->save();
        return $question;
    }
    public function destroy($id)  
    {
        $question = Question::find($id);
        
        if($request->user()->id != $question->user_id){
            return response()->json(['error' => 'tidak boleh mengedit forum']);
        }
        $question->delete();
        return response()->json(['succses' => true],200);
    }
}
