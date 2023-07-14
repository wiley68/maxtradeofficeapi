<?php

use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/** Api V1 */
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => 'auth:sanctum'], function(){
    Route::apiResource('tasks', TaskController::class);
    Route::apiResource('comments', CommentController::class);
});

/** setup */
Route::get('/setup', function(){
    $credentials = [
        'email' => 'test@example.com',
        'password' => 'password'
    ];
    if (!Auth::attempt($credentials)){
        $user = new User();
        $user->name = 'Test User';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->save();
        if (Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('MaxtradeOffice', ['create', 'update', 'delete'])->plainTextToken;
            return response([
                'user' => $user,
                'token' => $token
            ]);
        }
    }
});