<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthUserResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $user = $request->user();
       
        $user->tokens()->delete();

        $user->token = $user->createToken($user->name)->plainTextToken;

        return $this->respond(AuthUserResource::make($user), "Logged in successfully.");
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        $user = $request->user();
       
        $user->tokens()->delete();

        return $this->respond(true, "Logged out successfully.");
    }
}
