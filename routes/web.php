<?php

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

Route::get('/', 'HomeController@index');
Route::get('/login', function () {
    return view('login');
});
Route::post('/userLogin', ['as' => 'validate_login',  'uses' => 'UserController@check_auth']);
Route::get('/logout', ['as' => 'logout',  'uses' => 'UserController@logout']);

//Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'HomeController@index');

	/********************SIDEBAR ROUTES**************************/

	/***ROUTES FOR Clients*/
	Route::get('/RegisterClient', ['as' => 'register',  'uses' => 'UserController@registerClient_v']);/*view*/
	Route::get('/clientList', ['as' => 'clientList',  'uses' => 'UserController@clientList']);/*listing*/
	/***ROUTES ENDS*/

	/***ROUTES FOR RECEPTION*/
	Route::get('/receptionInfo', ['as' => 'basicClient',  'uses' => 'UserController@basic_infoClient']);/*view*/
	Route::get('/receptionClientList', ['as' => 'receptionClientList',  'uses' => 'UserController@receptionClientList']);/*listing*/
	/***ROUTES FOR RECEPTION ENDS*/

	/********************SIDEBAR ROUTES ENDS**************************/


	/************************REGISTER CLIENT ROUTES**********************/\
	/*add client (form)*/
	Route::post('/storePatient',['as'=>'store_patient','uses'=>'UserController@store']);/*add*/
	/*Monitor client*/
	Route::get('/monitorClient/{id}', ['as' => 'monitorClient',  'uses' => 'MonitorController@monitorClient']);/*monitoring view*/
	/*Edit client route(Button) --> clientList.blade.php */
	Route::get('/editClient/{id}', ['as' => 'editClient',  'uses' => 'UserController@editClient']);/*edit view*/
	/*Update client (form)*/
	Route::post('/updateClient', ['as' => 'updateClient',  'uses' => 'UserController@updateClient']);/*update*/
	/*delete client*/
	Route::get('/deleteClient/{id}', ['as' => 'deleteClient',  'uses' => 'UserController@deleteClient']);/*delete*/
	/************************REGISTER CLIENT ROUTES ENDS**********************/

	/*****************RECEPTION CLIENT ROUTES*********************/
	/*store reception client*/
	Route::post('/receptionClient', ['as' => 'receptionClient',  'uses' => 'UserController@addReceptionClient']);/*add*/
	/*edit client button route*/
	Route::get('/editReceptionClient/{id}', ['as' => 'editReceptionClient',  'uses' => 'UserController@editReceptionClient']);/*edit view*/
	/*update reception client*/
	Route::post('/updateReceptionClient', ['as' => 'updateReceptionClient',  'uses' => 'UserController@updateReceptionClient']);/*
	/*delete recption client*/
	Route::get('/deleteReceptionClient/{id}', ['as' => 'deleteReceptionClient',  'uses' => 'UserController@deleteReceptionClient']);
	Route::get('/visitorDetail', ['as' => 'visitorDetail',  'uses' => 'ReceptionController@visitorDetail']);/*add*/
	/*add visitor*/
	Route::post('/addVisitor', ['as' => 'addVisitor',  'uses' => 'ReceptionController@addVisitor']);/*add*/
	/*list of visitors*/
	Route::get('/listVisitors', ['as' => 'listVisitors',  'uses' => 'ReceptionController@listVisitors']);/*list*/
	/*Edit visitor*/
	
	/*view inquirycalls*/
	Route::get('/inquiryCalls', ['as' => 'inquiryCalls',  'uses' => 'ReceptionController@inquiryCalls']);

	Route::get('/missedCalls', ['as' => 'missedCalls',  'uses' => 'ReceptionController@missedCalls']);

	Route::get('/fbMessages', ['as' => 'fbMessages',  'uses' => 'ReceptionController@fbMessages']);

	Route::get('/visitorSheets', ['as' => 'visitorSheets',  'uses' => 'ReceptionController@visitorSheets']);

	Route::get('/vcitaSheets', ['as' => 'vcitaSheets',  'uses' => 'ReceptionController@vcitaSheets']);

	Route::get('/weberSheets', ['as' => 'weberSheets',  'uses' => 'ReceptionController@weberSheets']);

	Route::get('/editVisitor/{id}', ['as' => 'editVisitor',  'uses' => 'ReceptionController@editVisitor']);
	/*update visitor*/
	Route::post('/updateVisitor', ['as' => 'updateVisitor',  'uses' => 'ReceptionController@updateVisitor']);
	/*Delete visitor*/
	Route::get('/deleteVisitor/{id}', ['as' => 'deleteVisitor',  'uses' => 'ReceptionController@deleteVisitor']);

	/*****************RECEPTION CLIENT ROUTES ENDS*********************/

	/*********************Ammar Work Start*****************************/


	/****************Storekeeper routes Start***************************/
	/*add items */
	Route::get('/addItems', ['as' => 'addItems',  'uses' => 'StorekeeperController@addItems']);/*add*/
	/*Insert item*/
	Route::post('/saveItem', ['as' => 'saveItem',  'uses' => 'StorekeeperController@saveItem']);/*Save items*/
	/*Lit items*/
	Route::get('/listItems', ['as' => 'listItems',  'uses' => 'StorekeeperController@listItems']);/*List items*/
	/*Update Items*/
	Route::get('/edititem/{id}', ['as' => 'edititem',  'uses' => 'StorekeeperController@edititem']);/*edit items*/
	/*Update Item*/
	Route::post('/updateItem/', ['as' => 'updateItem',  'uses' => 'StorekeeperController@updateItem']);/*update items*/
	/*delete item*/
	Route::get('/deleteItem/{id}', ['as' => 'deleteItem',  'uses' => 'StorekeeperController@deleteItem']);/*delete*/
	/****************Storekeeper routes End***************************/

	/****************staff routes*************************************/

	Route::resource('staff','StaffController');
	Route::get('staff/{id}/delete','StaffController@delete');
	Route::get('/password','StaffController@changePassword');
	Route::post('staff/update-password','StaffController@updatePassword');

	/****************staff routes ENDS*************************************/


	/****************Monitor routes Start***************************/
	/*Add monitor detail */
	Route::post('/storeMonitor', ['as' => 'storeMonitor',  'uses' => 'MonitorController@storeMonitor']);/*add*/
	/****************Monitor routes End***************************/

	/****************Settings routes Start***************************/
	Route::get('/setting', ['as' => 'setting',  'uses' => 'SettingController@setting']);/*List items*/
	Route::post('/addvideo', ['as' => 'addvideo',  'uses' => 'SettingController@addvideo']);/*add*/
	/****************setting routes End***************************/

});