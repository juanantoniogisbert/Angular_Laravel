<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Requests\API\RegisterUser;
use App\User;
use App\RealWorld\Transformers\UserTransformer;

class AuthController extends ApiController {

    public function __construct(UserTransformer $transformer) {
        $this->transformer = $transformer;
    }

    public function register(RegisterUser $request) {
        $user = User::create([
            'username' => $request->input('user.username'),
            'email' => $request->input('user.email'),
            'password' => $request->input('user.password'),
        ]);

        return $this->respondWithTransformer($user);
    }

    public function login(LoginUser $request) {
        $credentials = $request->only('user.email', 'user.password');
        $credentials = $credentials['user'];

        if (! Auth::once($credentials)) {
            return $this->respondFailedLogin();
        }

        return $this->respondWithTransformer(auth()->user());
    }
}
