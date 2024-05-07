<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return inertia('Index/index',
        ['message' => 'Hello from laravel!']);
    }
    public function show(){
        return inertia('Index/show');
    }

}
