<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index(){
        $currentUser = Auth::user();
        return "ID: ".Auth::id()."; name: ".$currentUser->name . "; email: ". $currentUser->email;
    }
}
