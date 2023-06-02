<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GadgetController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\SearchController;
use App\Models\Types;
use App\Models\Manufacturer;

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
    return view('search', ['types' => Types::all(), 'manufacturers' => Manufacturer::all()]);
});

Route::post('/submitsearch', [SearchController::class, 'submitsearch']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


/*************************** Gadget Types **********************************/

Route::get('/types', [TypesController::class, 'index']);

Route::post('/type/store', [TypesController::class, 'store']);

//Route::get('type/destroy/{id}', [TypesController::class, 'destroy']);


/*************************** Gadget Manufacturer **********************************/

Route::get('/manufacturer', [ManufacturerController::class, 'index']);

Route::post('/manufacturer/store', [ManufacturerController::class, 'store']);


/*************************** Gadgets *****************************************/

Route::get('/gadgets', [GadgetController::class, 'index']);

Route::post('/gadgets/store', [GadgetController::class, 'store']);

Route::get('/gadgets/profile/{id}', [GadgetController::class, 'show']);

Route::get('/gadgets/edit/{id}', [GadgetController::class, 'edit']);

Route::post('/gadgets/update', [GadgetController::class, 'update']);

Route::get('gadgets/destroy/{id}', [GadgetController::class, 'destroy']);

/************************** Search **********************************************/



