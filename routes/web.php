<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;

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


Route::get('health', function () {
    return "OK";
});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); 

 
Route::resource('people', PeopleController::class, [
    'names' => [
        'index' => 'people',
        'create' => 'people.create', 
        'edit' => 'people.edit',
        'destroy' => 'people.destroy',
    ]
])->middleware(['auth']);
require __DIR__.'/auth.php';
