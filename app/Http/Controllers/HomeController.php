<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function __construct(){
        $this->middleware(['auth','verified']);
    }
       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index(){
        dd("welcome to home contooller");
        return view('welcome');
     }
}
