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
// Route::get('pusherTest', function(){
//     // return view('pusherTest');
//     event(new App\Events\TestEvent('hello world'));
//     return "event has been send";
// });


Route::get('/', function () {
    return view('welcome');
});
Route::get('/insert/{id}/{temperature}/{humidity}/{airPressure}/{rain}', 'SensorController@insert');

Route::get('sensorLast', 'SensorController@sensorLast')->name('sensorLast');
Route::post('/insertPost', 'SensorController@insertPost');

Route::get('temperature/{id?}', 'PublicController@temperature')->name('temperature');
Route::get('humidity/{id?}', 'PublicController@humidity')->name('humidity');
Route::get('airPressure/{id?}', 'PublicController@airPressure')->name('airPressure');
Route::get('rain/{id?}', 'PublicController@rain')->name('rain');

// Route::get('getCount', function(){
// 	// return DB::table('sensors')->count();
// });

Route::get('dashboard/{id?}', 'PublicController@dashboard')->name('dashboard');
Route::get('test', function(){
    return view('test');
});

Route::get('recap', 'SensorController@recap')->name('recap');

//this need admin role
Route::resource('device', 'DeviceController')->middleware('auth') ;
Route::get('device-publish/{id}', 'DeviceController@publish')->middleware('auth')->name('device.publish') ;
// Route::get('test', 'SensorController@test');
// Route::get('')
// Route::get('test', function() {
//     $begin = memory_get_usage();
//     $price = DB::table('sensors')
//                 ->last();
//     echo $price. '<br>';
//     echo 'Total memory usage : '  . (memory_get_usage() - $begin);
//   });

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

// Route::get('login', function(){
//     return view('auth.login');
// });
