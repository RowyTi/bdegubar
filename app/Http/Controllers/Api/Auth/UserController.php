<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getAuthUser(Request $request): JsonResponse
    {
        $user = $request->user();

        $permission = $user->getAllPermissions()->pluck('name')->toArray();

        if($user->profile_id !== null) {
            $avatar = $user->profile()->pluck('avatar')->toArray();
        }else {
            $avatar = [null];
        }
        return response()->json([
            'id'        => $user->id,
            'username'  => $user->username,
            'sa'        => $user->hasRole('Super Admin'),
            'avatar'    => $avatar[0],
            'scope'     => $permission,
            'state'     => $user->state,
            'branch'    => $user->branch()->first(),
            'profile_id'=> $user->profile_id
        ]);
    }
}
