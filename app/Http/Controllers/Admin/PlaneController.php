<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plane;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlaneRequest;
use App\Models\Airline;
use Illuminate\Http\Request;
use DataTables;

class PlaneController extends Controller
{
    public function index()
    {
        $planes = Plane::with('airline:id,name')->get();

        return view('admin.planes.index', compact('planes'));
    }

    public function create()
    {
        $airlines = Airline::all()->pluck('name', 'id');
        return view('admin.planes.create', compact('airlines'));
    }

    public function store(PlaneRequest $request)
    {
        try {
            $validated = $request->validated();
            Plane::create($validated);

            return redirect()->route('planes.index')->with([
                "message" =>  __('messages.success'),
                "icon" => "success",
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                "message" =>  $th->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    public function edit(Plane $plane)
    {
        $airlines = Airline::all()->pluck('name', 'id');
        return view('admin.planes.edit', compact("plane", "airlines"));
    }

    public function update(PlaneRequest $request, Plane $plane)
    {
        try {
            $validated = $request->validated();
            $plane->update($validated);

            return redirect()->route('planes.index')->with([
                "message" =>  __('messages.update'),
                "icon" => "success",
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                "message" =>  $th->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    public function destroy(Plane $plane)
    {
        $plane->delete();
        return redirect()->route('planes.index');
    }
}
