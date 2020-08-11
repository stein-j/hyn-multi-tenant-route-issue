<?php

namespace App\Http\Controllers;

use App\Mail\RouteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function hello()
    {
        if (request()->has('now')){
            Mail::to('user@support.com')->send(new RouteMail());
        }
        else {
            Mail::to('user@support.com')->queue(new RouteMail());
        }
        return route('world');
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
