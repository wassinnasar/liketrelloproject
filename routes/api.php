<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeskController;
use App\Http\Controllers\DeskListController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('desks', 'DeskController');
Route::apiResource('desks-lists', 'DeskListController');
//Route::apiResource('desks', 'DeskController')->only(['show','index','destroy','update','store']);
//Route::apiResources([
//    'desks'=> 'DeskController',
//    'desks-lists'=> 'DeskListController',
//]);
