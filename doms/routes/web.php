<?php
use App\Http\Controllers\DomController;
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
    return view('welcome');
});


Route::get('/index',[Domcontroller::class,'index']);

Route::get('/create',[DomController::class, 'create']);

Route::post('/store',[DomController::class, 'store']);

Route::get('doms/{id}/edit',[DomController::class,'edit']);

Route::put('doms/{id}',[DomController::class,'update']);

Route::delete('doms/{id}',[DomController::class,'destroy']);

Route::get('doms/{id}',[DomController::class,'show'])->name('doms.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
