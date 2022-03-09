<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    auth()->login(User::first());
    //auth()->logout();
    return view('welcome');
});

Route::get('chat', function(){
    return view('chat');
});

Route::post('/send-message', function(\Illuminate\Http\Request $request){
    event(new \App\Events\Message($request->input('name'), $request->input('message')));
});

