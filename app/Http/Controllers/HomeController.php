<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lifebuoy;
use App\Models\Visitor;
use App\Models\Rent;

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
        $lifebuoyCount = Lifebuoy::count();
        $visitorCount = Visitor::count();
        $rentCount = Rent::count();
        return view('home', ['lifebuoy_count' => $lifebuoyCount, 'visitor_count' => $visitorCount, 'rent_count' => $rentCount]);
        
    }
}
