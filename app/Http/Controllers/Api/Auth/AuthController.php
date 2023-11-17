<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(AuthRequest $request) {

        $user = User::where('email', $request->email)->first();
        $isPasswordCorrect = Hash::check($request->password, $user?->password);

        if(!$user || !$isPasswordCorrect) {
            throw ValidationException::withMessages([
                'email' => 'Credenciais inválidas'
            ]);
        }
        $user->tokens()->delete();
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json(compact('token'));
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json(['message'=>'sucesso']);
    }

    public function me(){
        return response()->json(['me'=> auth()->user()]);
    }
}
