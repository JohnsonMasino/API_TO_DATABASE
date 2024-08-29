<?php

namespace App\Http\Controllers\Action;

use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RegistrationAction
{
    public function handle(RegistrationRequest $request)
    {
        $user = User::query()->create($request->validated());
        $user->login();
        return successfulResponse([
            'data' => [
                'user' => new UserResource($user)
            ]
        ], 'User registered', ResponseAlias::HTTP_CREATED);
    }
}