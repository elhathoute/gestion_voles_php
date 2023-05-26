<?php

namespace App\Http\Controllers\Admin;

use App\Models\Airport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AirportRequest;
use App\Models\City;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class AirportController extends Controller
{
    public function index()
    {
        $airports = Airport::with('city')->get();

        return view('admin.airports.index', compact('airports'));
    }


    public function create()
    {
        $cities = City::all()->pluck('name', 'id');
        return view('admin.airports.create', compact('cities'));
    }

    public function store(AirportRequest $request)
    {
        try {
            $validated = $request->validated();
            Airport::create($validated);

            return redirect()->route('airports.index')->with([
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

    public function edit(Airport $airport)
    {
        $cities = City::all()->pluck('name', 'id');
        return view('admin.airports.edit', compact('cities', 'airport'));
    }

    public function update(AirportRequest $request, Airport $airport)
    {
        try {
            $validated = $request->validated();
            $airport->update($validated);

            return redirect()->route('airports.index')->with([
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

    public function destroy(Airport $airport)
    {
        $airport->delete();
        return redirect()->route('airports.index');
    }

    public function export()
    {
        // get the heading of your file from the table or you can created your own heading
        $table = "airports";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Airport::all();

        // create file name
        $fileName = "airport_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new AirportsImport, $filePath);

        // delete temp file after uploading
        unlink($filePath);

        return redirect()->route('airports.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}
