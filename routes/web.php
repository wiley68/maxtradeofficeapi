<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
            $token = $user->createToken('MaxtradeOffice')->plainTextToken;
            return response([
                'user' => $user,
                'token' => $token
            ]);
        }
    }
});