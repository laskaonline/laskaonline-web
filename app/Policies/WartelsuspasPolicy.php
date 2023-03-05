<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Wartelsuspas;
use Illuminate\Auth\Access\HandlesAuthorization;

class WartelsuspasPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, Wartelsuspas $wartelsuspas): bool
    {
        return $user->hasRole('admin') || $wartelsuspas->created_by == $user->id;
    }

    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function update(User $user, Wartelsuspas $wartelsuspas): bool
    {
        return $user->hasRole('admin') || $wartelsuspas->created_by == $user->id;
    }

    public function delete(User $user, Wartelsuspas $wartelsuspas): bool
    {
        return $user->hasRole('admin') || $wartelsuspas->created_by == $user->id;
    }

    public function restore(User $user, Wartelsuspas $wartelsuspas): bool
    {
        return $user->hasRole('admin') || $wartelsuspas->created_by == $user->id;
    }

    public function forceDelete(User $user, Wartelsuspas $wartelsuspas): bool
    {
        return $user->hasRole('admin') || $wartelsuspas->created_by == $user->id;
    }
}
