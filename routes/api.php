<?php

use App\Events\NewProduct;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PriceController;
use App\Models\Order;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('/json_1', function() {
        return [1, 3, 5 ,7 ,9 , 11];
    });
});

Route::resource('/price', PriceController::class)->only([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
]);

Route::get('/event', function () {
    $order = new Order();
    $order
        ->fill([
            'amount' => 'amount',
            'note' => 'note',
        ])
        ->save();
    event(new NewProduct($order->find($order->id)));
    return $order;
});