<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    HomeController,
    AirlineController,
    AirportController,
    CustomerController,
    PlaneController,
    FlightController,
    ProfileController,
    TicketController
};

use App\Http\Controllers\SandboxController;
use App\Http\Controllers\SidebarControler;

/*-------------New Part----------------*/

// get all flights in users
Route::get('/customer_flights', [FlightController::class, 'customer_flights'])->middleware('auth')->name('customer.flights');
// search flight
Route::post('search_flights/{NumVol?}/{compagnie?}/{aeroport?}/{provonance?}', [FlightController::class, 'SearchFlightByNVol'])
    ->middleware('auth')
    ->name('search-flight');

//
Route::get('/customer_rapport', function () {
    return view('customer.rapport');
})->name('customer.rapports');









Auth::routes();

Route::group(["prefix" => 'dashboard'], function () {
    Route::group(['middleware' => 'auth'], function () {
        /* ================== USER ROUTES ================== */

        //profile
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
        Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');



        /* ================== ADMIN ROUTES ================== */
        Route::group(['middleware' => 'admin'], function () {
            Route::get('/', [HomeController::class, 'root'])->name('root');


            //airlines
            Route::resource("airlines", AirlineController::class);

            //planes
            Route::resource("planes", PlaneController::class)->except('show');

            //airports
            Route::resource("airports", AirportController::class)->except('show');

            //flights
            Route::get("flights/get-planes-by-airline", [FlightController::class, 'getPlanesByAirline'])->name('flights.getPlanesByAirline');

            Route::resource("flights", FlightController::class)->except('show');
            Route::post("flight/canceled/{id}", [FlightController::class,'flight_canceled'])->name('flights.canceled');
            Route::post("flight/delay/{id}", [FlightController::class,'flight_delay'])->name('flights.delay');


            //customers
            Route::get("customers", [CustomerController::class, "index"])->name('customers.index');
            Route::get("customers/{user}", [CustomerController::class, "show"])->name('customers.show');
        });
    });
});


Route::view('/', 'index');

Route::view('/', 'index');
Route::view('/about', [HomeController::class, 'about'])->name('about');



Route::post('/store-temp-file', [HomeController::class, 'storeTempFile'])->name('storeTempFile');
Route::post('/delete-temp-file', [HomeController::class, 'deleteTempFile'])->name('deleteTempFile');

Route::get('/get-random-customer', [SandboxController::class, 'randomCustomer'])->name('randomCustomer');

//render files inside views/template folder
Route::get('{any}', [HomeController::class, 'index'])->name('index');
