<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Product;
use App\Models\Staff;
use App\Models\Table;
use App\Models\User;
use App\Rules\Slug;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UniquesController extends Controller
{
    public function usersUnique($request)
    {
        $isUsuario = User::withTrashed()->select("email")->where('email', $request)->first();
        if (!$isUsuario) {
            $res = false;
        }else{
            $res = true;
        }
        return response()->json(['valido' => $res]);
    }

    public function staffUnique($request)
    {
        $isStaff = Staff::withTrashed()->select("username")->where('username', $request)->first();
        if (!$isStaff) {
            $res = false;
        }else{
            $res = true;
        }
        return response()->json(['valido' => $res]);
    }

    public function branchUnique($request)
    {
        $isBranch = Branch::withTrashed()->select("slug")->where('slug', $request)->first();
        if (!$isBranch) {
            $res = false;
        }else{
            $res = true;
        }
        return response()->json(['valido' => $res]);
    }

    public function tableUnique($table)
    {
        $isTable = Table::select("slug")->where('slug', $table)->first();
        if (!$isTable) {
            $res = false;
        }else{
            $res = true;
        }
        return response()->json(['valido' => $res]);
    }

    public function categoriesUnique($request)
    {
        $isCategory = Category::select("slug")->where('slug', $request)->first();
        if (!$isCategory) {
            $res = false;
        }else{
            $res = true;
        }
        return response()->json(['valido' => $res]);
    }

    public function productsUnique($request)
    {
        $isProduct = Product::withTrashed()->select("slug")->where('slug', $request)->first();
        if (!$isProduct) {
            $res = false;
        }else{
            $res = true;
        }
        return response()->json(['valido' => $res]);
    }
}
