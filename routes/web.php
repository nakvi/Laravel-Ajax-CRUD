<?php
use App\Models\Ajax;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;


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
    return view('Create');
});
Route::get('show',[AjaxController::class,'show']);
Route::post('store',[AjaxController::class,'index']);
Route::get('edit/{id}',[AjaxController::class,'edit']);
Route::get('delete/{id}',[AjaxController::class,'destroye']);


