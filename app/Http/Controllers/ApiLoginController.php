<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
//        $credentials = $request->validate([
//            'email' => ['required', 'email'],
//            'password' => ['required']
//        ]);

//        return response()->json($request->all());

        if (Auth::attempt($request->all())) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->plainTextToken;

            return response()->json(['success' => [$user, $token]]);
        }

        return response()->json(['error' => 'user error data']);
    }
}
