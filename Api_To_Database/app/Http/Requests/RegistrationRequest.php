<?php

namespace App\Http\Controllers\Action\Candidate;

use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\CandidateResource;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RegistrationAction
{
    public function handle(RegistrationRequest $request)
    {
        $candidate = Candidate::query()->create($request->validated());
        $candidate->login();
        return successfulResponse([
            'data' => [
                'user' => new CandidateResource($candidate)
            ]
        ], 'New User added', ResponseAlias::HTTP_CREATED);
    }
}