<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('home_page');
// });
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home_page');
Route::get('/user', [HomeController::class, 'index2'])->name('tokobunga2s.homeuser');
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index1'])->name('tokobunga2s.home');
    Route::post('/admin', [HomeController::class, 'store']) ->name('tokobunga2s.store');
    Route::get('/admin/create', [HomeController::class, 'create'])->name('tokobunga2s.create');
    Route::get('/admin/{tokobunga2s}/edit', [HomeController::class, 'edit']) ->name("tokobunga2s.edit");
    Route::post('/admin/{tokobunga2s}', [HomeController::class, 'update']) ->name("tokobunga2s.update");
    Route::delete('/admin/{tokobunga2s}', [HomeController::class, 'destroy']) ->name("tokobunga2s.destroy");
});