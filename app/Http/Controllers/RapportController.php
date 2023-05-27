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
        dd($request);
        $rapport = Rapport::create($request->validated());
        // move file to /public rapports
        $request->file('file')->move(public_path('rapports'), $rapport->name . '.pdf');

        return redirect()->route('customer.rapports.index')->with('success', 'Rapport created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function show(Rapport $rapport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function edit(Rapport $rapport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRapportRequest  $request
     * @param  \App\Models\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRapportRequest $request, Rapport $rapport)
    {
        //
    }


    public function destroy()
    {
    }
}
