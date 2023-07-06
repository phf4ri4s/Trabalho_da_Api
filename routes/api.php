<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("/create-task",[TarefaController::class, "store"]);



Route::get("/index/{cod}", [TarefaController::class, "index"]);

Route::get("/show", [TarefaController::class, "show"]);



Route::patch("/edit/{cod}", [TarefaController::class, "edit"]);



Route::delete("/delete/{cod}", [TarefaController::class, "destroy"]);