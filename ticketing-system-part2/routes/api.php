<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LookupController;
use App\Http\Controllers\UserTicketController;
use App\Http\Controllers\UserUserController;
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

//  admin user route
Route::apiResource('admin/user',UserController::class)->middleware('auth:sanctum');

//user route 
Route::apiResource('user',UserUserController::class)->middleware('auth:sanctum');

// AUTH ROUTE
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// admin ticket route
Route::apiResource('admin/ticket',TicketController::class)->middleware('auth:sanctum');

//userticket Route
Route::apiResource('ticket',UserTicketController::class)->middleware('auth:sanctum');


// LOOKUP
Route::get('lookup/role',[RoleController::class,'getRole']);

// get all user
Route::get('lookup/user',[LookupController::class,'getAllUser']);
// get all ticket
Route::get('lookup/ticket',[LookupController::class,'getAllTicket']);
// get all category
Route::get('lookup/category',[LookupController::class,'getAllCategory']);
// get all status
Route::get('lookup/status',[LookupController::class,'getAllStatus']);
// get all category
Route::get('lookup/priority-level',[LookupController::class,'getAllPriority']);