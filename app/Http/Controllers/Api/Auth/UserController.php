<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        $user = $request->user();
        $permissions = ['super-admin', 'view:dashboard'];

        return [
            $user,
            'scope' => $permissions
        ];
    }
}
