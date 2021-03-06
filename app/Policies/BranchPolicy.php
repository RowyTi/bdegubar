<?php

namespace App\Policies;

use App\Models\Branch;
use App\Models\Staff;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchPolicy
{
    use HandlesAuthorization;

    public function index($staff, $request): bool
    {
        return $staff->tokenCan('index:branch');
    }

    public function read($type): bool
    {
        return $type->tokenCan('read:branch');
    }

    public function create($type): bool
    {
        return $type->tokenCan('create:branch');
    }

    public function update($type, Branch $branch): bool
    {
        return $type->tokenCan('update:branch') && $type->branch_id === $branch->id;
    }

    public function delete($type, Branch $branch): bool
    {
        return $type->tokenCan('delete:branch') && $type->branch_id === $branch->id;
    }

//    public function modifyRelationshipPaymentkey(Staff $staff, $branch){
//
//        return $staff->tokenCan('update:payment') &&
//            $branch->id === $staff->branch_id;
//    }
}
