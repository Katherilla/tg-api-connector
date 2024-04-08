<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TgChatIdController;
use App\Models\TgChatId;

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
    return "hello from tg-api-connector";

});

Route::get('/hello', 'TgChatIdController@daily_report');
