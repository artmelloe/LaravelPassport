<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterCreateRequest;
use App\Http\Resources\RegisterResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            $user = Auth::user();

            $token = $user->createToken('admin')->accessToken;

            $cookie = \Cookie('jwt', $token, 3600);

            return \Response([
                'token' => $token,
            ])->withCookie($cookie);
        }

        return response(['error' => 'Invalid Credentials',], Response::HTTP_UNAUTHORIZED);
    }

    public function logout()
    {
        $cookie = \Cookie::forget('jwt');

        return \Response(['message' => 'success'])->withCookie($cookie);
    }

    public function register(RegisterCreateRequest $request)
    {
        $user = User::create($request->only('name', 'email', 'phone', 'role_id') + [
            'password' => Hash::make($request->input('password'))
        ]);

        return response(new RegisterResource($user), Response::HTTP_CREATED);
    }
}
