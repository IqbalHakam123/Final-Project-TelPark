<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lifebuoy;
use App\Models\Ride;
use App\Models\Age;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LifebuoyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Lifebuoy";
        $subTitle = 'lifebuoy list';

        // ELOQUENT
        $lifebuoys = Lifebuoy::with('rides')->get();
        confirmDelete();

        return view('lifebuoy.index', [
            'pageTitle' => $pageTitle,
            'subTitle' => $subTitle,
            'lifebuoys' => $lifebuoys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Lifebuoy';
        $subTitle = "create lifebuoy";
        $rides = Ride::all();
        $ages = Age::all();

        // // ELOQUENT

        return view('lifebuoy.create', compact('pageTitle','subTitle', 'rides', 'ages'));
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
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'rides' => 'required|array',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $lifebuoy = New Lifebuoy;
        $lifebuoy->name = $request->name;
        $lifebuoy->description = $request->description;
        $lifebuoy->stock = $request->stock;
        $lifebuoy->age_id = $request->age;
        $lifebuoy->save();

        $rideIds = $request->input('rides');
        $lifebuoy->rides()->attach($rideIds);
        Alert::success('Added Successfully', 'Lifebuoy Data Added Successfully.');

        return redirect()->route('lifebuoys.index');
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
        $pageTitle = 'Lifebuoy';
        $subTitle = 'edit lifebuoy';

        //ELOQUENT
        $lifebuoy = Lifebuoy::find($id);
        $rides = Ride::all();
        $ages = Age::all();


        return view('lifebuoy.edit', compact('pageTitle','subTitle', 'lifebuoy', 'rides', 'ages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'rides' => 'required|array',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $lifebuoy = Lifebuoy::find($id);
        $lifebuoy->name = $request->name;
        $lifebuoy->description = $request->description;
        $lifebuoy->stock = $request->stock;
        $lifebuoy->age_id = $request->age;
        $lifebuoy->save();

        $lifebuoy->rides()->sync($request->input('rides'));
        Alert::success('Update Successfully', 'Lifebuoy Data Changed Successfully.');

        return redirect()->route('lifebuoys.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Lifebuoy::find($id)->delete();
            Alert::success('Deleted Successfully', 'Lifebuoy Data Deleted Successfully.');
            return redirect()->back();
        } catch (\Exception $e){
            Alert::error('Data cannot be deleted!', 'Rent is in Progress.');
            return redirect()->back();
        }
    }
}
