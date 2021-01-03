<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('register', [UserController::class, 'register'])->name('register'); 

Route::middleware(['Session'])->group(function(){
    Route::get('logout', function (){
        if(session()->has('user')){
            session()->pull('user');
        }
        return redirect('/');
    })->name('logout');

    Route::view('index', 'index')->name('index');
    
    Route::get('allStudents', [StudentController::class, 'index'])->name('allStudents');
    Route::view('addStudent', 'addStudent')->name('addStudent');
    Route::post('addStudent', [StudentController::class, 'add']);
    Route::get('editStudent/{id}', [StudentController::class, 'editIndex'])->name('editStudent');
    Route::post('editStudent/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::get('deleteStudent/{id}', [StudentController::class, 'deleteIndex'])->name('deleteStudent');
    Route::post('deleteStudent/{id}', [StudentController::class, 'delete'])->name('delete');


    Route::get('allCountries', [CountryController::class, 'index'])->name('allCountries');
    //Route::view('addAirport', 'addAirport')->name('addAirportIndex');
    Route::post('addAirport', [CountryController::class, 'addAirport'])->name('addAirport');
    Route::get('editAirport/{id}', [CountryController::class, 'editAirportIndex'])->name('editAirportIndex');
    Route::post('editAirport/{id}', [CountryController::class, 'editAirport'])->name('editAirport');
    Route::get('deleteAirport/{id}', [CountryController::class, 'deleteAirportIndex'])->name('deleteAirportIndex');
    Route::post('deleteAirport/{id}', [CountryController::class, 'deleteAirport'])->name('deleteAirport');


    Route::get('allLocations', [LocationController::class, 'index'])->name('allLocations');
    Route::post('addLocation', [LocationController::class, 'addLocation'])->name('addLocation');
});

// Route::post('allStudent/search', [StudentController::class, 'search'])->name('search');