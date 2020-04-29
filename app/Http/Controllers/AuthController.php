<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!auth()->attempt($request->all())) {
            return response()->json(["message" => "Unaunthenticated"]);
        }

        $accessToken = auth()->user()->createToken("accessToken")->accessToken;

        return response()->json(["access_token" => $accessToken]);
    }

    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json($user);
    }
}
