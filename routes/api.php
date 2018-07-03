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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('users', 'UserControllerAPI@index');
Route::post('users/register', 'UserControllerAPI@register');
Route::post('users/login', 'UserControllerAPI@login');
//
//Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {
//    Route::post('users/login', 'UserControllerAPI@login');
//});

Route::post('note/add','NoteControllerAPI@addNote')->middleware('checkToken');

Route::get('test', function() {

//   $myname =  \App\Http\Controllers\HumanController::name('Hamad Adel Mahmoud')->height(168)->weight(66)->sayHello();
    $myname = \Human::name('Hamad Adel Mahmoud')->height(168)->weight(66)->sayHello();
    dd($myname);

});
//Route::get('addNote', function(){
////    $myNote = new \App\Http\Controllers\UserNoteController;
//    $myNote =\UserNote::setID(55)->AddNote('chaining & Facade Task solved');
//    dd($myNote);
//});