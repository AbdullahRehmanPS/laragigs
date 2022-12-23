<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
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

//Resource Method Naming (1:44:09)
// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

//view basics and passing data: changes name of resources/view/welcome.blade.php to listings.blade.php
// and changed return view('welcome') to ('listings') (28:26)
//Route::get('/', function () {
//    return view('listings', [
//        'listings' => Listing::all()
//    ]);
//});

//Route::get('/listings/{id}', function ($id) {
//    return view('listing', [
//        'listing' => Listing::find($id)
//    ]);
//});
//replacement for upper route because upper route will not handle unexpected params (Route Model Binding 1:26:00)
//Route::get('/listings/{listing}', function (Listing $listing) {
//    return view('listing', [
//        //'listing' => Listing::find($listing)
//        'listing' => $listing //(this line will work same as upper line)
//    ]);
//});

//These two routes are created using Controller, and these two routes are replacement for upper two routes
Route::get('/', [ListingController::class, 'index']);    //all listings
Route::get('/listings/create', [ListingController::class,'create']);  //show create form
Route::post('/listings', [ListingController::class, 'store']);      //store listings data
Route::get('/listings/{listing}', [ListingController::class, 'show']);  //single listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']); //Show edit form
Route::put('/listings/{listing}', [ListingController::class, 'update']); //Update Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);  //delete listing






//routing and responses(13:50)
Route::get('/hello', function () {
    return response('<h1>welcome</h1>', 200)
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');
});

//wildcard endpoints: use {} to give wildcard(19:28)
//route constraints: add route constraints using where(20:16)
//Die Dump Helpers(dd,ddd):(21:06)
Route::get('/posts/{id}', function ($id) {
    //ddd($id);
    return response('Post: ' . $id);
})->where('id', '[0-9]+');


Route::get('/search', function (Request $request) {
    dd($request);
});
