<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
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
/*====================== Admin Route ==========================*/
Route::prefix('admin')->group(function(){

Route::get('/login',[AdminController::class,'Index'])->name('login_form');

Route::post('/login/owner',[AdminController::class,'Login'])->name('admin.login');

Route::get('/dashboard',[AdminController::class,'Dashboard'])->name('admin.dashboard')->middleware("admin");

Route::get('/logout',[AdminController::class,'AdminLogout'])->name('admin.logout')->middleware("admin");
});
/*====================== End Admin Route ==========================*/

/*====================== Editor Route ==========================*/
Route::prefix('editor')->group(function(){

    Route::get('/login',[EditorController::class,'EditorIndex'])->name('editor_login_form');
    
    Route::post('/login/owner',[EditorController::class,'EditorLogin'])->name('editor.login');
    
    Route::get('/dashboard',[EditorController::class,'EditorDashboard'])->name('editor.dashboard')->middleware("editor");
    
    Route::get('/logout',[EditorController::class,'EditorLogout'])->name('editor.logout')->middleware("editor");
    });
    /*====================== End Editor Route ==========================*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
