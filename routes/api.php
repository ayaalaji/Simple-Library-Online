<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\BookControlller;
use App\Http\Controllers\Api\MainCategoryController;
use App\Http\Controllers\Api\SubCategoryController as ApiSubCategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Models\SubCategory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[AuthController::class,'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/store/book',[BookController::class,'store']);
    Route::post('/add/sub/category',[ApiSubCategoryController::class,'store']);
    Route::post('/add/main/category',[MainCategoryController::class,'store']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('/books',[BookController::class]);
Route::get('/books',[BookController::class,'index']);
Route::get('/show/book',[BookController::class,'show']);

Route::get('/sub/category',[ApiSubCategoryController::class,'index']);
Route::get('/show',[ApiSubCategoryController::class,'show']);

Route::get('/main/category',[MainCategoryController::class,'index']);
Route::get('/show',[MainCategoryController::class,'show']);

