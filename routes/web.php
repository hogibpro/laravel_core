<?php

use App\Http\Controllers\DependencyInjection;
use App\Http\Controllers\UserController;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/users/register', [UserController::class, 'register']);

Route::get('/dependency-injection', [DependencyInjection::class, 'register']);
/*
* ReflectionClass ky thuat khoi tao dependency injection cua laravel
* Skill check xem 1 route can dependency nhung gi de chay
* co the debug cac class can gi 
* day cx la ky thuat khoi tao class cua laravel Reflection Class
*/
Route::get('reflection', function () {
    $reflection = new ReflectionClass(UserController::class);
    $parameters = $reflection->getConstructor()->getParameters();

    $method = $reflection->getMethod('register');
    //dd($method);
    // dd($parameters[0]->getClass());

    $container = Container::getInstance();

    $dependency = [];
    foreach ($parameters as $parameter) {
        $dependency[] = $container->make($parameter->getType()->getName());
    }
    // dd($dependency);

    $controller = new UserController(...$dependency);
    dd($controller);
    $needToInjected = [];
    foreach ($parameters as $parameter) {
        $parameter->getName();
        $parameter->getClass();
    }

});

// Route::get('/{any}', function () {
//     return view('post');
//   })->where('any', '.*');