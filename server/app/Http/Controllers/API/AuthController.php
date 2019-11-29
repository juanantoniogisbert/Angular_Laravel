<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Requests\API\RegisterUser;
use App\User;
// use Illuminate\Http\Request;
use App\RealWorld\Transformers\UserTransformer;

class AuthController extends ApiController {

    protected function respond($data, $statusCode = 200, $headers = []) {
        return response()->json($data, $statusCode, $headers);
    }


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
}
