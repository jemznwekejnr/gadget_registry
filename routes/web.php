<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GadgetController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\GeneralController;
use App\Models\Types;
use App\Models\Manufacturer;
use App\Models\Gadgets;

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
    return view('search', ['types' => Types::all(), 'manufacturers' => Manufacturer::groupBy('manufacturer')->get(), 'models' => Gadgets::groupBy('model')->get()]);
});

Route::post('/submitsearch', [SearchController::class, 'submitsearch']);

Route::get('/checkemailexist/{email}', [SearchController::class, 'checkemailexist']);

Route::get('/searchresult/{records}', [SearchController::class, 'searchresult']);

Route::get('/dashboard', function () {
    return view('search', ['types' => Types::all(), 'manufacturers' => Manufacturer::groupBy('manufacturer')->get(), 'models' => Gadgets::groupBy('model')->get()]);
})->middleware(['auth'])->name('search');

require __DIR__.'/auth.php';


/*************************** Gadget Types **********************************/

Route::get('/types', [TypesController::class, 'index']);

Route::post('/type/store', [TypesController::class, 'store']);

Route::get('type/destroy/{id}', [TypesController::class, 'destroy']);


/*************************** Gadget Manufacturer **********************************/

Route::get('/manufacturer', [ManufacturerController::class, 'index']);

Route::post('/manufacturer/store', [ManufacturerController::class, 'store']);

Route::get('/manufacturer/destroy/{id}', [ManufacturerController::class, 'destroy']);


/*************************** Gadgets *****************************************/

Route::get('/gadgets', [GadgetController::class, 'index']);

Route::get('/gadgets/create', [GadgetController::class, 'create']);

Route::post('/gadgets/store', [GadgetController::class, 'store']);

Route::get('/gadgets/profile/{id}', [GadgetController::class, 'show']);

Route::get('/gadgets/edit/{id}', [GadgetController::class, 'edit']);

Route::post('/gadgets/update', [GadgetController::class, 'update']);

Route::get('/gadgets/destroy/{id}', [GadgetController::class, 'destroy']);

Route::get('/gadgets/fetchmanufacturers/{id}', [SearchController::class, 'fetchmanufacturers']);

Route::get('/gadgets/fetchmodel/{id}', [SearchController::class, 'fetchmodel']);

Route::get('/gadgets/history', [GadgetController::class, 'history']);

Route::get('/users', [GadgetController::class, 'users']);

/************************** Search **********************************************/


/********************* My Controller **********************************************/

Route::get('/mine/registereddevice', [MyController::class, 'registereddevice']);

Route::get('/mine/searcheddevice', [MyController::class, 'searcheddevice']);

Route::get('/dashboards', [MyController::class, 'dashboard']);




