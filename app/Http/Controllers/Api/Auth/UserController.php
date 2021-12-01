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
    public function __invoke(Request $request): JsonResponse
    {
        $user = $request->user();

        return response()->json([
            'id'        => $user->id,
            'username'  => $user->username,
            'scope'     => $user->getPermissionNames()->toArray(),
            'state'     => $user->state,
            'branch_id' => $user->branch_id,
            'branch'    => $user->branch()->first(),
            'profile_id'=> $user->profile_id
        ]);
    }
}
