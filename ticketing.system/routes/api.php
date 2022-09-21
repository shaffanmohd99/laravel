<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\DeveloperTicketController;
use App\Http\Controllers\LookupController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('user',UserController::class);


Route::post('auth/register', [AuthController::class, 'register']);

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout']);

// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::get('me', function(Request $request) {
//         return auth()->user();
//     });

//     Route::post('auth/logout', [AuthController::class, 'logout']);
// });

Route::apiResource('ticket',TicketController::class)->middleware('auth:sanctum');

//LOOKUP 
Route::get('lookup/categories',[LookupController::class,'getCategories']);
Route::get('lookup/statuses',[LookupController::class,'getStatus']);
Route::get('lookup/priorities',[LookupController::class,'getPriority']);


// DEVELOPER
// Route::post('developer/category',[DeveloperController::class,'addCategory'])->middleware('auth:sanctum');

// category (only for developer)
Route::apiResource('developer/category',CategoryController::class)->middleware('auth:sanctum');

// ticket for developer
Route::apiResource('developer/ticket',DeveloperTicketController::class)->middleware('auth:sanctum');
