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
        if ($staff->tokenCan('index:staff')){
            return $current_branch === $staff->branch_id;
        }else{
            return $staff->tokenCan('admin:staff') &&
                $current_branch === $staff->branch_id;
        }
    }

    public function read($type, Staff $staff): bool
    {
        if ($type->tokenCan('admin:staff')){
            return $type->branch_id === $staff->branch_id;
        }else{
            return $type->tokenCan('read:staff') && $type->is($staff);
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
