<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ping', fn () => 'ok');                    // proves Laravel boots
Route::get('/key-check', fn () => config('app.key') ? 'key:ok' : 'key:missing');
Route::get('/db-check', function () {
    try { DB::select('select 1'); return 'db:ok'; }
    catch (\Throwable $e) { return response('db:fail: '.$e->getMessage(), 500); }
});