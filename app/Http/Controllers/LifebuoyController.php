<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lifebuoy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LifebuoyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Lifebuoy List";

        // ELOQUENT
        $lifebuoys = Lifebuoy::all();

        return view('lifebuoy.index', [
            'pageTitle' => $pageTitle,
            'lifebuoys' => $lifebuoys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = "Create Lifebuoy";

        // // ELOQUENT
        // $ages = Age::all();

        return view('lifebuoy.create', compact('pageTitle'));
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
            // 'age' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $lifebuoy = New Lifebuoy;
        $lifebuoy->name = $request->name;
        $lifebuoy->description = $request->description;
        $lifebuoy->stock = $request->stock;
        $lifebuoy->save();

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
        $pageTitle = 'Edit Lifebuoy';

        //ELOQUENT
        $lifebuoy = Lifebuoy::find($id);

        return view('lifebuoy.edit', compact('pageTitle', 'lifebuoy'));
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

        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $lifebuoy = Lifebuoy::find($id);
        $lifebuoy->name = $request->name;
        $lifebuoy->description = $request->description;
        $lifebuoy->stock = $request->stock;
        $lifebuoy->save();

        return redirect()->route('lifebuoys.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        Lifebuoy::find($id)->delete();

        return redirect()->route('lifebuoys.index');
    }
}
