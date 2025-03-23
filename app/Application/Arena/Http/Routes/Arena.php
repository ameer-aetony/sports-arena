<?php


use Illuminate\Support\Facades\Route;
use Myapp\Application\Arena\Http\Controller\ArenaController;

Route::group(['prefix' => 'arenas'], function () {
 Route::get('/',[ArenaController::class,'index']);
 Route::post('/',[ArenaController::class,'store']);
});

