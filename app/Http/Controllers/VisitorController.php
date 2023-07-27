<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Age;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Visitor";
        $subTitle = 'visitor list';

        // ELOQUENT
        $visitors = Visitor::all();
        confirmDelete();

        return view('visitor.index', [
            'pageTitle' => $pageTitle,
            'subTitle' => $subTitle,
            'visitors' => $visitors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = "Visitor";
        $subTitle = 'Create Visitor';

        // ELOQUENT
        $ages = Age::all();

        return view('visitor.create', compact('pageTitle', 'subTitle', 'ages'));
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
            'phone' => 'required',
            // 'age' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $visitor = New Visitor;
        $visitor->name = $request->name;
        $visitor->phone = $request->phone;
        $visitor->age_id = $request->age;
        $visitor->save();
        Alert::success('Added Successfully', 'Visitor Data Added Successfully.');


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
        $pageTitle = 'Visitor';
        $subTitle = 'edit visitor';

        //ELOQUENT
        $ages = Age::all();
        $visitor = Visitor::find($id);

        return view('visitor.edit', compact('pageTitle','subTitle', 'ages', 'visitor'));
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
            'phone' => 'required',
            // 'age' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $visitor = Visitor::find($id);
        $visitor->name = $request->name;
        $visitor->phone = $request->phone;
        $visitor->age_id = $request->age;
        $visitor->save();
        Alert::success('Update Successfully', 'Visitor Data Updated Successfully.');


        return redirect()->route('visitors.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        try {
            Visitor::find($id)->delete();
            Alert::success('Deleted Successfully', 'Visitor Data Deleted Successfully.');
            return redirect()->back();
        } catch (\Exception $e){
            Alert::error('Data cannot be deleted!', 'Rent is in Progress.');
            return redirect()->back();
        }
    }
}
