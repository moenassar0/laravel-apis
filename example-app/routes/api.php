<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;


Route::group(['prefix' => "v1"], function(){
    Route::get("/firstAPI/{name}", [APIController::class, 'firstAPI']);
    Route::get("/secondAPI/{num}", [APIController::class, 'secondAPI']);
    Route::get("/thirdAPI/{str}", [APIController::class, 'thirdAPI']);
    Route::get("/fourthAPI/{str}", [APIController::class, 'fourthAPI']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
