<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


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

Route::post('/getTodo', [TodoController::class, 'GetTodo']);
Route::post('/addTodo', [TodoController::class, 'AddTodo']);
Route::post('/updateTodo', [TodoController::class, 'UpdateTodo']);
Route::post('/deleteTodo', [TodoController::class, 'DeleteTodo']);
Route::get('/getAllTodos', [TodoController::class, 'GetAllTodos']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
