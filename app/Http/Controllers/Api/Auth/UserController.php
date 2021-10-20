<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        
        // $user->scope = ['view:dashboard', 'view:user', 'administracion'];
        // $user->scope = $user->getPermissionNames();

        // branch_id: 12
        // created_at: "2021-10-18T05:04:38.000000Z"
        // id: 3
        // permissions: [{id: 53, name: "view:user", guard_name: "sanctum", created_at: "2021-10-18T05:04:37.000000Z",…},…]
        // profile_id: 38
        // scope: ["view:user", "show:user"]
        // state: "activo"
        // updated_at: "2021-10-18T05:04:38.000000Z"
        // username: "htoy"

        return response()->json([
            'id'        => $user->id,
            'username'  => $user->username,
            'scope'     => $user->getPermissionNames(),
            'state'     => $user->state,
            'branch_id' => $user->branch_id,
            'profile_id'=> $user->profile_id
        ]);
    }
}
