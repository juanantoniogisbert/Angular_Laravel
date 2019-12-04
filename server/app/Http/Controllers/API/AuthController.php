<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Requests\API\LoginUser;
use App\Http\Requests\API\RegisterUser;
use App\User;
use App\RealWorld\Transformers\UserTransformer;
use Auth;
use Laravel\Socialite\Facades\Socialite;

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

    // public function auth($provider) {
    //     return $this->socialLogin->authenticate($provider);
    // }

    // public function sociallogin($provider) {
    //     print_r($provider);
    //     try {
    //         $user = $this->socialLogin->login($provider);
    //         $valUser = User::where('email', '=', $user->email)->first();
    //         if($valUser === null){
    //             $user = User::create([
    //                 'username' => $user->name,
    //                 'email' => $user->email,
    //                 'password' => $user->id,
    //                 'followers' => 0,
    //                 'image' => $user->avatar
    //             ]);
    //         }
            
    //         Storage::disk('local')->put('file.txt',$this->respondWithTransformer($valUser));
    //         return redirect()->to('http://localhost:4200/sociallogin');
    //     } catch (SocialAuthException $e) {
    //         echo 'Not User';
    //     }
    // }

    // public function loginsocial(Request $request) {
    //     $exists = Storage::disk('local')->exists('file.txt');
    //     if($exists){
    //         $user = Storage::disk('local')->get('file.txt');
    //         Storage::disk('local')->delete('file.txt');
    //     }
    //     return explode('GMT',$user)[1];
    // }

    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback() {
        $user = Socialite::driver('github')->user();
    }
}