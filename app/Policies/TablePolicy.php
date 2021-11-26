<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class TablePolicy
{
    use HandlesAuthorization;

   
    public function index($table, $request): bool
    {
        $branch = $request->query->get('filter');
        $current_branch = (int)$branch['branch_id'];
        if ($table->tokenCan('index:table')){
            return $current_branch === $table->branch_id;
        }else{
            return $table->tokenCan('admin:table') &&
                $current_branch === $table->branch_id;
        }
    }

    public function read($type, table $table): bool
    {
        if ($type->tokenCan('admin:table')){
            return $type->branch_id === $table->branch_id;
        }else{
            return $type->tokenCan('read:table') && $type->is($table);
        }
    }

    public function create($type): bool
    {
        return $type->tokenCan('create:table') ||
            $type->tokenCan('admin:table');
    }

    public function update($type, table $table): bool
    {
        if ($type->tokenCan('admin:table')){
            return $type->branch_id === $table->branch_id;
        }else{
            return $type->tokenCan('update:table') && $type->is($table);
        }
    }

    public function delete($type, table $table): bool
    {
        if ($type->tokenCan('admin:table')){
            return $type->branch_id === $table->branch_id;
        }else{
            return $type->tokenCan('delete:table') && $type->is($table);
        }
    }
}
