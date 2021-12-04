<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Branch;

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
        
        return response()->json([
            'id'        => $user->id,
            'username'  => $user->username,
            'scope'     => $permission,
            'state'     => $user->state,
            // 'branch_id' => $user->branch_id,
            'branch'    => $user->branch()->first(),
            'profile_id'=> $user->profile_id
        ]);
    }
}
