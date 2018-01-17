<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::get('/customers-by-year',['as'=>'customerByYear','uses'=>'reportingController@customerByYear']);
Route::get('/customers-by-month',['as'=>'customerByMonth','uses'=>'reportingController@customerByMonth']);

Route::get('/expenses-by-month',['as'=>'expensesByMonth','uses'=>'reportingController@monthlyExpenses']);