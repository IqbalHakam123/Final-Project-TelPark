<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Visitor;
use App\Models\Lifebuoy;
use App\Models\Rent;
use App\Models\Ride;
use Carbon\Carbon;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Rent List";

        // ELOQUENT
        $rents = Rent::all();

        return view('rent.index', [
            'pageTitle' => $pageTitle,
            'rents' => $rents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = "Add Rent";

        // ELOQUENT
        $visitors = Visitor::all();
        $lifebuoys = Lifebuoy::all();
        $rides = Ride::all();

        return view('rent.create', compact('pageTitle', 'visitors', 'lifebuoys', 'rides'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
        ];

        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
            // // 'lastName' => 'required',
            // 'name' => 'required',
            'borrow' => 'required',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $rent->borrow = date('h:i:sa', strtotime($_POST['borrow']));
        // $rent->deadline = date('h:i:sa', strtotime($_POST['deadline']));

        // $visitor = Visitor::find($visitorId);
        // $lifebuoy = Lifebuoy::find($lifebuoyId);
        // CHECK STOCK
        // $lifebuoy_stock = $lifebuoy->stock;
        // $alert = 'Stok pelampung habis!';

        // if ($lifebuoy_stock < 1) {
        //     return $alert;
        // }

        // ELOQUENT
        $rent = New Rent;
        $rent->ride_id = $request->ride;
        $rent->lifebuoy_id = $request->lifebuoy;
        $rent->visitor_id = $request->visitor;
        $rent->borrow = Carbon::now();
        $rent->deadline = Carbon::now()->setTime(17, 0, 0);
        $rent->save();

        return redirect()->route('rents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function check_stock($lifebuoyId)
    {
        $stock = DB::table('lifebuoys')
            ->select('stock')
            ->where('id', $lifebuoyId)
            ->value('stock');

        return $stock;
    }

    public function reduce_stock($lifebuoyId)
    {
        $stock = DB::table('lifebuoys')
            ->where('id', $lifebuoyId)
            ->decrement('stock');
    }

    public function add_stock($lifebuoyId)
    {
        $stock = DB::table('lifebuoys')
            ->where('id', $lifebuoyId)
            ->increment('stock');
    }
}
