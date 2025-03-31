<?php


use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified', 'checkRole: admin,author'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//partie categories
Route::resource('/category', CategoryController::class)->middleware('admin');  

//partie articles
Route::resource('/article', ArticleController::class);

//partie des authors

Route::resource('/author',UserController::class)->middleware('admin');

//partie media social

Route::resource('/social', SocialMediaController::class)->middleware('admin');

//partie paramettrage du site

Route::get('/paramettre',[SettingsController::class,'index'])->name('settings.index')->middleware('admin');
Route::put('/modifier/parametre',[SettingsController::class,'update'])->name('settings.update');


require __DIR__.'/auth.php'; 



