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
        $current_branch = (int)$branch['branch_id'];
//        dd($user->branch_id === $branch->id);
//        dd((int)$branch['branch_id'] === $staff->branch_id);
        return $staff->tokenCan('index:staff')
        && $current_branch === $staff->branch_id;
    }
}
