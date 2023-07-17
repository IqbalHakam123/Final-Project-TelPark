<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Age;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Visitor List";

        // ELOQUENT
        $visitors = Visitor::all();

        return view('visitor.index', [
            'pageTitle' => $pageTitle,
            'visitors' => $visitors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = "Create Visitor";

        // ELOQUENT
        $ages = Age::all();

        return view('visitor.create', compact('pageTitle', 'ages'));
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
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            // 'age' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $visitor = New Visitor;
        $visitor->firstname = $request->firstName;
        $visitor->lastname = $request->lastName;
        $visitor->phone = $request->phone;
        $visitor->age_id = $request->age;
        $visitor->save();

        return redirect()->route('visitors.index');
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
        $pageTitle = 'Edit Visitor';

        //ELOQUENT
        $ages = Age::all();
        $visitor = Visitor::find($id);

        return view('visitor.edit', compact('pageTitle', 'ages', 'visitor'));
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
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            // 'age' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $visitor = Visitor::find($id);
        $visitor->firstname = $request->firstName;
        $visitor->lastname = $request->lastName;
        $visitor->phone = $request->phone;
        $visitor->age_id = $request->age;
        $visitor->save();

        return redirect()->route('visitors.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        Visitor::find($id)->delete();

        return redirect()->route('visitors.index');
    }
}
