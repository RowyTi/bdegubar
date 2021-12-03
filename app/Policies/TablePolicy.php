<?php

namespace App\Policies;

use App\Models\Table;
use Illuminate\Auth\Access\HandlesAuthorization;

class TablePolicy
{
    use HandlesAuthorization;


    public function index($table, $request): bool
    {
//        dd($table);
        $branch = $request->query->get('filter');
        $current_branch = (int)$branch['branch_id'];
        return $table->tokenCan('index:table') && $current_branch === $table->branch_id;
    }

    public function read($type, Table $table): bool
    {
        return $type->tokenCan('read:table') && $type->branch_id === $table->branch_id;;
    }

    public function create($type): bool
    {
        return $type->tokenCan('create:table');
    }

    public function update($type, Table $table): bool
    {
        return $type->tokenCan('update:table') && $type->branch_id === $table->branch_id;

    }

    public function delete($type, Table $table): bool
    {
//        dd($type->tokenCan('delete:table'));
        return $type->tokenCan('delete:table') && $type->branch_id === $table->branch_id;

    }
}
