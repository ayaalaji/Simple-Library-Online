<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\MainCategoryController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/////    ROLE    ///////
Route::get('roles',[RoleController::class, 'index'])->name('roles.index')->middleware('auth');
Route::post('roles',[RoleController::class, 'store'])->name('roles.store')->middleware('auth');
Route::get('roles/create',[RoleController::class, 'create'])->name('roles.create')->middleware('auth');
Route::get('roles/{id}',[RoleController::class, 'show'])->name('roles.show')->middleware('auth');
Route::put('roles/{id}',[RoleController::class, 'update'])->name('roles.update')->middleware('auth');
Route::get('roles/{id}/edit',[RoleController::class, 'edit'])->name('roles.edit')->middleware('auth');
Route::delete('roles/{id}',[RoleController::class, 'destroy'])->name('roles.destroy')->middleware('auth');

//////// USER   ////////
Route::get('users',[UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::post('users',[UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('users/create',[UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::get('users/{id}',[UserController::class, 'show'])->name('users.show')->middleware('auth');
Route::put('users/{id}',[UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('users/{id}/edit',[UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::delete('users/{id}',[UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');

////////    BOOK   ////////
Route::get('books',[BookController::class, 'index'])->name('books.index')->middleware('auth');
Route::post('books',[BookController::class, 'store'])->name('books.store')->middleware('auth');
Route::get('books/create',[BookController::class, 'create'])->name('books.create')->middleware('auth');
Route::get('books/{book}',[BookController::class, 'show'])->name('books.show')->middleware('auth');
Route::put('books/{book}',[BookController::class, 'update'])->name('books.update')->middleware('auth');
Route::get('books/{book}/edit',[BookController::class, 'edit'])->name('books.edit')->middleware('auth');
Route::delete('books/{book}',[BookController::class, 'destroy'])->name('books.destroy')->middleware('auth');


////////   Sub Category    ////////
Route::get('sub_categories',[SubCategoryController::class, 'index'])->name('sub-categories.index')->middleware('auth');
Route::post('sub_categories',[SubCategoryController::class, 'store'])->name('sub-categories.store')->middleware('auth');
Route::get('sub_categories/create',[SubCategoryController::class, 'create'])->name('sub-categories.create')->middleware('auth');
Route::get('sub_categories/{sub_category}',[SubCategoryController::class, 'show'])->name('sub-categories.show')->middleware('auth');
Route::put('sub_categories/{sub_category}',[SubCategoryController::class, 'update'])->name('sub-categories.update')->middleware('auth');
Route::get('sub_categories/{sub_category}/edit',[SubCategoryController::class, 'edit'])->name('sub-categories.edit')->middleware('auth');
Route::delete('sub_categories/{sub_category}',[SubCategoryController::class, 'destroy'])->name('sub-categories.destroy')->middleware('auth');

////////  Main Category    /////////
Route::get('main_categories',[MainCategoryController::class, 'index'])->name('main-categories.index')->middleware('auth');
Route::post('main_categories',[MainCategoryController::class, 'store'])->name('main-categories.store')->middleware('auth');
Route::get('main_categories/create',[MainCategoryController::class, 'create'])->name('main-categories.create')->middleware('auth');
Route::get('main_categories/{main_category}',[MainCategoryController::class, 'show'])->name('main-categories.show')->middleware('auth');
Route::put('main_categories/{main_category}',[MainCategoryController::class, 'update'])->name('main-categories.update')->middleware('auth');
Route::get('main_categories/{main_category}/edit',[MainCategoryController::class, 'edit'])->name('main-categories.edit')->middleware('auth');
Route::delete('main_categories/{main_category}',[MainCategoryController::class, 'destroy'])->name('main-categories.destroy')->middleware('auth');

// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('books', BookController::class);
//     Route::resource('main_categories', MainCategoryController::class);
//     Route::resource('sub_categories', SubCategoryController::class);
// });
