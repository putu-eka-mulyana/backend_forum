<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Answers;

class AnswersController extends Controller
{
    public function store(Request $request,$id)
    {
        $this->validate($request,['body' => 'required']);

        $answers = $request->user()->Answers()->create([
            'body' => $request->json('body'),
            'question_id' => $id,
        ]);

    }
}
