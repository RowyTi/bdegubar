<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index(){
        return Permission::select('name','id')->orderBy('id')->get();
//        dd(Permission::all());
    }

    public function getRole(): JsonResponse
    {
        $role = Role::whereNotIn('name', ['Super Admin'])->get();
        return response() ->json([
            'roles' => $role->pluck('name')
        ]);
//        dd($role->pluck('name'));
    }
}
