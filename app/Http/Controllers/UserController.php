<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profil(Request $request){
        return $request->user();
    }
}
