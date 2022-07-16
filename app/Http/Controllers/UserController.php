<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use ApiResponser;

    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email'],
            'role' => 2
        ]);

        return $this->success([
            'token' => $user->createToken('auth_token')->plainTextToken
        ], 'Account successfully created');
    }

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }

        $user = User::where('email', $request['email'])->first();
        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->success([
            'token' => $token
        ], 'Logged in successfully');
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        Auth::user()->tokens()->delete();

        return $this->success([], "Tokens Revoked");
    }
}