<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $token = JWTAuth::attempt($credentials);
    
            if ($token) {
                return view('templates.home');
                // return response()->json(['token' => $token]);
            } else {
                return response()->json(['error' => 'Unauthorized'], 402);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }


    public function logout()
    {
        // $token = JWTAuth::getToken(); // Obtener el token JWT de la solicitud
    
        // if ($token) {
        //     JWTAuth::invalidate($token); // Invalidar el token JWT
        // }
    
        Auth::logout(); // Cerrar sesión en la aplicación
        return view('login');
        // return response()->json(['message' => 'Successfully logged out']);
    }
}
