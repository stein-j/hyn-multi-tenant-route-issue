<?php

namespace App\Http\Controllers;

use App\Jobs\GetUrlJob;

class HomeController extends Controller
{

    public function job()
    {
        GetUrlJob::dispatch(route('job'));
        return route('job');
    }

    public function now()
    {
        GetUrlJob::dispatchNow(route('now'));
        return route('now');
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
