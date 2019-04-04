<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generation;

class dashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $entrees = Generation::where('mode',1)->take(10)->get();
        $sorties = Generation::where('mode',2)->take(10)->get();
        return view('dashboard.home')->with('entres',$entrees)->with('sorties',$sorties);
    }
}
