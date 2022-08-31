<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

if (! function_exists('getToken')) {
    function getToken(){
        $token = session('api_token');
        return $token;
    }
}

if (! function_exists('getNewToken')) {
    function getNewToken(Request $request){
        $user = $request->user();
        $time = 525600; // 1 year
        $token = $request->user()->createToken($user->email,['*'],now()->addMinutes($time))->plainTextToken;

        if(!session()->has('api_token')){
            session(['api_token' => $token]);
        }

        return $token;
    }
}

if (! function_exists('hasUserToken')) {
    function hasUserToken(Request $request){
        $token = getToken();

        if($token == null){
            $token = getNewToken($request);
        }

        return $token;
    }
}
