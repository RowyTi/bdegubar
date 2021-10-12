<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //Login redes sociales
    public function redirectToDriver($driver){
        return Socialite::driver($driver)->stateless()->redirect();
    }

    public function handleDriverCallback($driver){
       $user = Socialite::driver($driver)->stateless()->user();

       dd($user);
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
            'token' => $staff->createToken($request->username)->plainTextToken
        ]);
    }

    public function logoutStaff(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
