<?php

namespace App\Policies;
use App\Models\Staff;
use Illuminate\Auth\Access\HandlesAuthorization;

class StaffPolicy
{
    use HandlesAuthorization;

    public function index($staff, $request): bool
    {
        $branch = $request->query->get('filter');
        $current_branch = (int)$branch['branch_id'];
        return $staff->tokenCan('index:staff') || $staff->tokenCan('admin:staff')
        && $current_branch === $staff->branch_id;
    }

    public function read($type, Staff $staff): bool
    {
        if ($type->tokenCan('admin:staff')){
            return $type->branch_id === $staff->branch_id;
        }else{
            return $type->tokenCan('read:staff') && $type->id===$staff->id;
        }
    }

    public function create($type): bool
    {
        return $type->tokenCan('create:staff') ||
            $type->tokenCan('admin:staff');
    }

    public function update($type, Staff $staff): bool
    {
        if ($type->tokenCan('admin:staff')){
            return $type->branch_id === $staff->branch_id;
        }else{
            return $type->tokenCan('update:staff') && $type->is($staff);
        }
    }

    public function delete($type, Staff $staff): bool
    {
        if ($type->tokenCan('admin:staff')){
            return $type->branch_id === $staff->branch_id;
        }else{
            return $type->tokenCan('delete:staff') && $type->is($staff);
        }
    }
}
