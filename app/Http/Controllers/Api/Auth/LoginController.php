<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialNetwork;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Login Mobile Social
    public function loginMobileSocial(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required'],
            'socialNetwork' => ['required'],
            'socialId'  => ['required'],
            'name' => ['required'],
            'avatar' => ['required']
        ]);

        $socialProfile = SocialNetwork::firstOrNew([
            'social_name' => $request->socialNetwork,
            'social_id' => $request->socialId
        ]);


        if (!$socialProfile->exists) {
            // Verifico si existe un usuario con el email de la red social
            $user = User::firstOrNew([
                'email' => $request->email
            ]);

            if (!$user->exists) {
                $user->name = $request->name;
                $user->email_verified_at = now();
                $user->save();
            }

            $socialProfile->social_avatar = $request->avatar;

            $user->socialNetworks()->save($socialProfile);
        } else {
            $user = $socialProfile->user()->first();
        }

        if ($user->state ==='inactivo'){
            throw ValidationException::withMessages([
                'username' => 'Su cuenta se encuentra inactiva, comuníquese con soporte'
            ]);
        }

        $user->tokens()->delete();

        $token = $socialProfile->createToken($request->socialNetwork, ['public:user'])->plainTextToken;

        return response()->json([
                'user'          => $user,
                'perfil'        => $user->profile()->first(),
                'token'         => $token
        ]);
    }

    // Login Mobile tradicional
     public function loginMobile(Request $request): JsonResponse
     {
         $request->validate([
             'email' => ['required'],
             'password' => ['required']
         ]);

         $user = User::where('email', $request->email)->first();

         if (! Hash::check($request->password, optional($user)->password)) {
             throw ValidationException::withMessages([
                 'email' => [__('auth.failed')]
             ]);
         }

         if ($user->state ==='inactivo'){
             throw ValidationException::withMessages([
                 'username' => 'Su cuenta se encuentra inactiva, comuníquese con soporte'
             ]);
         }

         $user->tokens()->delete();

         return response()->json([
             'user'          => $user,
             'perfil'        => $user->profile()->first(),
             'token'         => $user->createToken($user->email, ['public:user'])->plainTextToken
         ]);
     }

    // Login empleados
    public function loginStaff(Request $request): JsonResponse
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $staff = Staff::where('username', $request->username)
            ->first();

        if (! Hash::check($request->password, optional($staff)->password)) {
            throw ValidationException::withMessages([
                'username' => [__('auth.failed')]
            ]);
        }
        if ($staff->state ==='inactivo'){
            throw ValidationException::withMessages([
                'username' => 'Su cuenta se encuentra inactiva'
            ]);
        }

        $staff->tokens()->delete();

        $permissions = $staff->getAllPermissions()->pluck('name')->toArray();
        return response()->json([
            'token' => $staff->createToken($staff->username, $permissions )->plainTextToken
        ]);
    }

    // Logout todos
    public function logout(Request $request): Response
    {
        $request->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
