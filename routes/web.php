<?php

use Illuminate\Support\Facades\Route;
use App\Events\Message;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', function () {
    return view('welcome');
});

Route::any('send-message',function (Request $request){
    event(new Message($request->username, $request->message));
    return ['success' => true];
});
