
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


Route::post('/subscribe', function(){
    $email= request('email');
    Newsletter::subscribe($email);
    Session::flash('subscribed', 'Successfully subscribed.');
    return redirect()->back();
});

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth','checkadmin'])->group(function () {  
        Route::resource('/users' , 'UserController');
        Route::post('/users/{user}', 'UserController@update')->name('users.update');
        Route::get('/users/{user}', 'UserController@destroy')->name('users.destroy');
});
Route::get('/baiviettheme1', 'ArticelthemeController@indextheme1')->name('baiviettheme.theme1');
Route::get('/baiviettheme2', 'ArticelthemeController@indextheme2')->name('baiviettheme.theme2');
Route::get('/baivietfriend', 'ArticelthemeController@indexfriends')->name('baiviettheme.friend');

Route::resource('/baiviet' , 'ArticelController');
Route::post('/baiviet/{baiviet}', 'ArticelController@update')->name('baiviet.update');
Route::get('/baiviet/{baiviet}', 'ArticelController@destroy')->name('baiviet.destroy');
Route::get('/baiviet{baiviet}', 'ArticelController@show')->name('baiviet.show');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
