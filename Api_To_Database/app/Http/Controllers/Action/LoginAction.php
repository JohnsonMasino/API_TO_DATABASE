<?php

namespace App\Http\Controllers\Action;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LoginAction
{
    public function handle(LoginRequest $request)
    {
        $user = User::query()->where('email', '=', $request->validated('email'))->first();
        if (Hash::check($request->validated('password'), $user->password)) {
            $user->login();
            return successfulResponse([
                'data' => [
                    'user' => new UserResource($user)
                ]
            ], 'you are logged in!');
        }

        return errorResponse('Wrong Credentials !, Try again.', ResponseAlias::HTTP_BAD_REQUEST);

    }
}