<?php

use Illuminate\Support\Facades\Route;
use App\Models\Surat;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AuthController;
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
    $surat = Surat::all();
    return view('home', compact('surat'));
});
Route::get('surat/pdf', [SuratController::class, 'createPDF']);
Route::get('surat/trash', [SuratController::class, 'trash']);
Route::get('surat/restore/{id?}', [SuratController::class, 'restore']);
Route::get('surat/delete/{id?}', [SuratController::class, 'deleted']);
Route::resource('surat', SuratController::class);

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        $surat = Surat::all();
        return view('home', compact('surat'));
    });
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});