<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Action\LoginAction;
use App\Http\Controllers\Action\RegisterAction;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;






class AuthController extends Controller
{
    public function register(RegistrationRequest $request, RegisterAction $action)
    {
        \Log::info('Register endpoint hit');
        return $action->handle($request);
    }

    public function login(LoginRequest $request, LoginAction $action)
    {
        \Log::info('Login endpoint hit');
        return $action->handle($request);
    }

    public function user(Request $request)
    {
        return successfulResponse([
            'data' => [
                'user' => new UserResource($request->user('sanctum'))
            ]
        ], 'User retrieved.');
    }
}