<?php

namespace App\Http\Controllers\Admin;

use view;
use DataTables;
use App\Models\Plane;
use App\Models\Flight;
use App\Models\Airline;
use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FlightRequest;
use Illuminate\Support\Facades\Validator;

class FlightController extends Controller
{
    // cancel flight
    public function flight_canceled(Request $request,$id=null){
        $flight_id=$id;
        $raison_annulation=$request['raison_annulation'];

        DB::table('vol_annule')->insert([
            'flight_id' => $flight_id,
            'raison_annulation' => $raison_annulation,
        ]);
        return back();
    }
    // delay
    public function flight_delay(Request $request,$id=null){
        $flight_id=$id;
        $duree_retard=$request['duree_retard'];

        DB::table('vol_retarde')->insert([
            'flight_id' => $flight_id,
            'duree_retard' => $duree_retard,
        ]);
        return back();
    }

    // search flight
    public function SearchFlightByNVol(Request $request, $num_vol = null, $compagnie = null, $aeroport = null,$provonance=null)
    {
        $flightNumber = $request->input('flight_number');
        $flightCmp = $request->input('compagnie');
        $flightAeoropt = $request->input('airport');
        $provonance=$request->input('provonance');

        //  dd($flightCmp);

        // Perform the search based on the provided inputs
        if ($flightNumber) {
            // Search flight by flight number
            $customer_flights = Flight::where('flight_number', $flightNumber)->paginate(1);
        }
        else if ($flightCmp || $flightAeoropt) {
            // Search flight by company/compagnie
            $customer_flights = Flight::where('airline_id', $flightCmp)
            ->orWhere('origin_id', $flightAeoropt)
            ->orWhere('destination_id', $flightAeoropt)
            ->paginate(6);
        }
        else if($provonance){
            $airport = Airport::where(function ($query) use ($provonance) {
                $query->whereHas('city', function ($query) use ($provonance) {
                    $query->where('id', $provonance);
                });
            })->get();

             $airportId=$airport->pluck('id')->toArray();

             $customer_flights = Flight::whereIn('origin_id', $airportId)
             ->orWhereIn('destination_id', $airportId)

             ->paginate(6);

        }


        else {
            // No search inputs provided, return all flights
            $customer_flights = Flight::paginate(6);
        }

        return view('customer.flights', compact('customer_flights'))->withInput($request->input())->with(['request' => $request]);
    }



    // customer_flights
    public function customer_flights(Request $request){
        $customer_flights= Flight::paginate(6);


    return view('customer.flights', compact('customer_flights'));


    }
    //  end customer_flights
    public function index()
    {
        $flights = Flight::with('airline:id,name')
            ->with('plane:id,code')
            ->with('origin:id,name')
            ->with('destination:id,name')
            ->with('status:id')
            ->get();

        return view('admin.flights.index', compact('flights'));
    }


    public function create()
    {
        // get all airlines that have planes
        $airlines = Airline::whereHas("planes")->pluck('name', 'id');
        $airports = Airport::all()->pluck('name', 'id');
        $planes = Plane::all()->pluck('name', 'id');
        return view('admin.flights.create', compact('airports', 'airlines', 'planes'));
    }

    public function store(FlightRequest $request)
    {
        try {
            $validated = $request->validated();
            // find plane
            $plane = Plane::find($validated['plane_id']);

            Flight::create([
                "flight_number" =>$validated['flight_number'],
                "airline_id" => $validated['airline_id'],
                "plane_id" => $validated['plane_id'],
                "origin_id" => $validated['origin_id'],
                "destination_id" => $validated['destination_id'],
                "departure" => $validated['departure'],
                "arrival" => $validated['arrival'],
                "seats" => $plane->capacity,
                "remain_seats" => $plane->capacity,
                // par defaut programmé
                "status_id" => 3,
                "price" => $validated['price'],
            ]);

            return redirect()->route('flights.index')->with([
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

    public function edit(Flight $flight)
    {
        $airlines = Airline::all()->pluck('name', 'id');
        $airports = Airport::all()->pluck('name', 'id');
        $planes = Plane::all()->pluck('name', 'id');
        return view('admin.flights.edit', compact('airports', 'airlines', 'planes', 'flight'));
    }

    public function update(FlightRequest $request, Flight $flight)
    {
        try {
            $validated = $request->validated();
            // find plane
            $plane = Plane::find($validated['plane_id']);

            $flight->update([
                "flight_number" =>$validated['flight_number'],
                "airline_id" => $validated['airline_id'],
                "plane_id" => $validated['plane_id'],
                "origin_id" => $validated['origin_id'],
                "destination_id" => $validated['destination_id'],
                "departure" => $validated['departure'],
                "arrival" => $validated['arrival'],
                "seats" => $plane->capacity,
                "remain_seats" => $plane->capacity,
                "status_id" => $validated['status_id'],
                "price" => $validated['price'],
            ]);

            return redirect()->route('flights.index')->with([
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

    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->route('flights.index');
    }

    public function getPlanesByAirline(Request $request)
    {
        $planes = Plane::whereAirlineId($request->airline_id)->pluck('name', 'id');

        // foreach planes push to array
        $planesArray = [];
        foreach ($planes as $key => $value) {
            $planesArray[] = [
                "id" => $key,
                "text" => $value,
            ];
        }
        return response()->json($planesArray);
    }
}
