<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;


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
    return view('listings', [
        'heading' => 'En Yeni İlanlar',
        'listings' => Listing::all()
    ]);
});


Route::redirect('/listings', '/', 301);

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});


Route::get('/listing/{listingID}', function ($listingID) {
    return view('listing', ['listing' => Listing::find($listingID)]);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
