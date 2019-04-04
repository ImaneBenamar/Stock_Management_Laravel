<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $entrees = Generation::where('mode',1)->take(10)->get();
        $sorties = Generation::where('mode',2)->take(10)->get();
        return view('dashboard.home')->with('entres',$entrees)->with('sorties',$sorties);
    }
}
