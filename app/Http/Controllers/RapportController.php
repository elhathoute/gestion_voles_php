<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use App\Http\Requests\StoreRapportRequest;
use App\Http\Requests\UpdateRapportRequest;

class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rapports = Rapport::all();
        return view('admin.rapports.index', compact('rapports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rapports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRapportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRapportRequest $request)
    {
        // dd($request);
        // $rapport = Rapport::create($request->validated['name']);
        // $rapport = Rapport::create(['name' => $request->validated['name']]);
        $validated = $request->validated();

        $rapport = Rapport::create([
            'name' => $validated['name']
        ]);


        // move file to /public rapports
        $request->file('file')->move(public_path('rapports'), $rapport->name . '.pdf');

        return redirect()->back()->with('success', 'Rapport created successfully.');
    }






    public function destroy()
    {
        // delete all files in /public rapports
        $files = glob(public_path('rapports/*'));
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        return redirect()->back()->with('success', 'Rapports deleted successfully.');
    }
}
