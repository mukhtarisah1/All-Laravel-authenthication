<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Country\CountryCountroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('country', [CountryCountroller::Class, 'getCountry']);
Route::get('country/{id}', [CountryCountroller::Class, 'getCountryById'] );

Route::post('country', [CountryCountroller::class, 'countrySave']);
Route::put('country/{country}', [CountryCountroller::class, 'countryUpdate']);
Route::delete('country/{country}', [CountryCountroller::class, 'countryDelete']);


