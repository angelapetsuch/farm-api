<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ToolController;
use App\Http\Controllers\API\PersonnelController;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:sanctum')->group( function () {
    Route::apiResource('products', ProductController::class);

    Route::apiResource('tools', ToolController::class);

    Route::apiResource('personnel', PersonnelController::class);

    Route::get('/products/{productId}/required-tools', [ProductController::class, 'getRequiredTools']);

    Route::get('/personnel/{personnelId}/product', [PersonnelController::class, 'getProduct']);
});

