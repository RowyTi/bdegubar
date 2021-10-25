<?php

namespace App\Policies;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function index($user): bool
    {
        return $user->tokenCan('index:user');
    }

    public function read($type, User $user): bool
    {
        return $type->tokenCan('read:user') &&
            $type->is($user);
    }

    public function create($type): bool
    {
        return $type->tokenCan('create:user');
    }

    public function update($type, User $user): bool
    {
        return $type->tokenCan('update:user') &&
            $type->is($user);
    }

    public function delete($type, User $user): bool
    {
        return $type->tokenCan('delete:user')
            && $type->is($user);
    }
}
