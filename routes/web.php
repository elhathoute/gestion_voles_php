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
   
};
use App\Http\Controllers\RapportController;
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
Route::get('/customer_rapport', [RapportController::class, 'index'])->name('customer.rapport');
Route::get('/customer_rapport/create', [RapportController::class, 'create'])->middleware('auth')->name('customer.rapport.create');
Route::post('/customer_rapport/store', [RapportController::class, 'store'])->middleware('auth')->name('customer.rapport.store');
Route::delete('/customer_rapport', [RapportController::class, 'destroy'])->middleware('auth')->name('customer.rapport.destroy');







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
            Route::post("flight/canceled/{id}", [FlightController::class, 'flight_canceled'])->name('flights.canceled');
            Route::post("flight/delay/{id}", [FlightController::class, 'flight_delay'])->name('flights.delay');


            //customers
            Route::get("customers", [CustomerController::class, "index"])->name('customers.index');
            Route::get("customers/{user}", [CustomerController::class, "show"])->name('customers.show');
            Route::get("customers/delete/{user}", [CustomerController::class, "delete"])->name('customers.delete');
        });
    });
});


Route::view('/', 'index');

Route::view('/about', [HomeController::class, 'about'])->name('about');



Route::post('/store-temp-file', [HomeController::class, 'storeTempFile'])->name('storeTempFile');
Route::post('/delete-temp-file', [HomeController::class, 'deleteTempFile'])->name('deleteTempFile');



//render files inside views/template folder
Route::get('{any}', [HomeController::class, 'index'])->name('index');
