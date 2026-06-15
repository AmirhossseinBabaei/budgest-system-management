<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1\Authentication;

use App\Enums\StatusCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Authentication\LoginRequest;
use App\Http\Requests\Api\V1\Authentication\RegisterRequest;
use App\Repositories\Classes\PersonalAccessTokenRepository;
use App\Repositories\Classes\UserRepository;
use Illuminate\Support\Facades\Hash;

class SanctumController extends Controller
{

    public function __construct(public UserRepository $userRepository, public PersonalAccessTokenRepository $personalAccessTokenRepository)
    {
    }

    public function RegisterUser(RegisterRequest $request)
    {
        $data = $request->validated();
        $userData = $this->userRepository->insert($data);
        $token = $this->personalAccessTokenRepository->insert($userData['id']);
        $textToken = $token['plain_text_token'];

        if (null == $userData['id']) {
            return response()->json([
                'message' => __('ResponseMessages.auth.registerError', 'The register failed'),
                'token' => null
            ], StatusCode::INTERNAL_SERVER_ERROR->value);
        }

        return response()->json([
            'message' => __('ResponseMessages.auth.registerSuccessfully'),
            'user' => $userData,
            'token' => $token
        ], StatusCode::OK->value);
    }

    public function LoginUser(LoginRequest $request)
    {
        $data = $request->validated();

        $user = $this->userRepository->getOneByColumn('phone', $data['phone']);

        if ($user && Hash::check($data['password'], $user['password'])) {
            $this->personalAccessTokenRepository->deleteByTokenTypeAndUserId($user['id']);
            $token = $this->personalAccessTokenRepository->insert($user['id']);

            return response()->json([
                'message' => __('ResponseMessages.auth.registerSuccessfully'),
                'user' => $user,
                'token' => $token
            ], StatusCode::OK->value);
        }

        return response()->json([
            'message' => __('ResponseMessages.auth.registerError', 'The phone or password already incorrect!'),
            'token' => null
        ], StatusCode::INTERNAL_SERVER_ERROR->value);
    }
}
