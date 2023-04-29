<?php

use App\Http\Controllers\Core\StoreContrller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('store', [StoreContrller::class, 'index']);
Route::post('store', [StoreContrller::class, 'store']);
Route::put('store/{id}', [StoreContrller::class, 'update']);
Route::delete('store/{id}', [StoreContrller::class, 'destroy']);


// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'v1'

// ], function ($router) {
//     Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
//     Route::get('store', [StoreContrller::class, 'index']);
//     Route::post('store', [StoreContrller::class, 'store']);
//     Route::put('store/{id}', [StoreContrller::class, 'update']);
//     Route::delete('store/{id}', [StoreContrller::class, 'destroy']);

// });



// Route::post('/login', function (Request $request) {
//     $credentials = $request->only('email', 'password');

//     if (! $token = auth()->attempt($credentials)) {
//         // return response()->json(['error' => 'Unauthorized'], 401);
//         abort(401);
//     }

//     return response()->json([
//         'data' => [
//             'token' => $token,
//         'token_type' => 'bearer',
//         'expires_in' => auth()->factory()->getTTL() * 60
//         ]
//     ]);
// });
