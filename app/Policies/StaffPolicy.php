<?php

namespace App\Policies;
use App\Models\Branch;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class StaffPolicy
{
    use HandlesAuthorization;

    public function index($staff, $request)
    {
        $branch = $request->query->get('filter');
//        $article->user->is($staff);
//        $branch = Branch::find(4);
//        dd($user->branch_id === $branch->id);
//        $request->query->get('foo[bar]', null, true);
        dd((int)$branch['branch_id'] === $staff->branch_id);
        return $staff->tokenCan('index:staff');
    }
}
