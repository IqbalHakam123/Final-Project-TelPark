<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Visitor;
use App\Models\Lifebuoy;
use App\Models\Rent;
use App\Models\ReturnRent;
use App\Models\Ride;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pageTitle = "Rent";
        $subTitle = 'rent list';

        // ELOQUENT
        $rents = Rent::all();

        return view('rent.index', [
            'pageTitle' => $pageTitle,
            'subTitle' => $subTitle,
            'rents' => $rents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = "Rent";
        $subTitle = 'create rent';

        // ELOQUENT
        $visitors = Visitor::all();
        $lifebuoys = Lifebuoy::all();
        $rides = Ride::all();

        return view('rent.create', compact('pageTitle', 'subTitle', 'visitors', 'lifebuoys', 'rides'));
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

        $lifebuoy_id = $request->input('lifebuoy');
        DB::beginTransaction();
        try {
            $actualStock = Lifebuoy::where('id', $lifebuoy_id)->first()->stock;

            if ($actualStock <= 0) {
                DB::rollBack();
                return Redirect::back()->with('error', 'Stok Pelampung ini kosong');
            } else {
                $rent = Rent::create([
                    'ride_id' => $request->ride,
                    'lifebuoy_id' => $request->lifebuoy,
                    'visitor_id' => $request->visitor,
                    'borrow' => Carbon::now(),
                    'deadline' => Carbon::now()->setTime(17, 0, 0),
                ]);

                $oldStock = $rent->lifebuoy->stock ?? null;

                Lifebuoy::where('id', $request->lifebuoy)->update([
                    'stock' => $oldStock - 1
                ]);
                DB::commit();
                return redirect()->route('rents.index')->with('success', 'Data Sewa Berhasil Ditambahkan');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()->with('error', 'Error');
        }
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


    public function return_rent(Request $request, Rent $rent)
    {
        date_default_timezone_set('Asia/Jakarta');
        $return_rent = ReturnRent::create([
            'rent_id' => $rent->id,
            'return' => Carbon::now(),
        ]);

        $oldStock = $return_rent->rent->lifebuoy->stock;

        Lifebuoy::where('id', $return_rent->rent->lifebuoy->id)->update([
            'stock' => $oldStock + 1
        ]);

        return redirect()->route('rents.index');
    }

    public function getLifebuoyFromRide(Request $request){
        $rideSelect = $request->ride_id;

        $rides = Ride::find($rideSelect);
        $data = $rides->lifebuoys;
        return response()->json(['lifebuoys' => $data]);
    }
}
