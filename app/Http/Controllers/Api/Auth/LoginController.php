<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialNetwork;
use App\Models\Staff;
use App\Models\User;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //Login redes sociales
    public function redirectToDriver($socialNetwork)
    {
        return Socialite::driver($socialNetwork)->stateless()->redirect();

    }

    public function handleDriverCallback($socialNetwork)
    {
        try {
            $socialUser = Socialite::driver($socialNetwork)->stateless()->user();
        } catch (ClientException $exception) {
            return response()->json(['error' => 'Hubo un error al intentar loguear'], 422);
        }

        $socialProfile = SocialNetwork::firstOrNew([
            'social_name' => $socialNetwork,
            'social_id' => $socialUser->getId()
        ]);

        if (!$socialProfile->exists) {
            // Verifico si existe un usuario con el email de la red social
            $user = User::firstOrNew([
                'email' => $socialUser->getEmail()
            ]);

            if (!$user->exists) {
                $user->name = $socialUser->getName();
                $user->email_verified_at = now();
                $user->save();
            }

            $socialProfile->social_avatar = $socialUser->getAvatar();

            $user->socialNetworks()->save($socialProfile);
        }

        $token = $socialProfile->createToken($socialNetwork, ['user:public'])->plainTextToken;

        return response()->json([
            [
                'token' => $token
            ]
        ]);
    }

    public function loginStaff(Request $request){

        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $staff = Staff::where('username', $request->username)->first();

        if (! Hash::check($request->password, optional($staff)->password)) {
            throw ValidationException::withMessages([
                'username' => [__('auth.failed')]
            ]);
        }
        return response()->json([
            'token' => $staff->createToken($request->username, ['create:user'])->plainTextToken
        ]);
    }

    public function logoutStaff(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
