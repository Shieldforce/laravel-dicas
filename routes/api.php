<?php

use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Support\Facades\File;
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

Route::post('/login', [ LoginController::class, "login" ]);

Route::middleware('auth:sanctum')->group(function () {

    foreach (File::allFiles(__DIR__ . "/api") as $route_file) {
        require $route_file->getPathname();
    }

});
