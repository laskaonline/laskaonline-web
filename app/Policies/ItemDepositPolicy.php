<?php

namespace App\Policies;

use App\Models\ItemDeposit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemDepositPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, ItemDeposit $itemDeposit): bool
    {
        return $itemDeposit->created_by == $user->id;
    }

    public function create(User $user): bool
    {
        return $user->hasRole('visitor');
    }

    public function update(User $user, ItemDeposit $itemDeposit): bool
    {
        return $itemDeposit->created_by == $user->id;
    }

    public function delete(User $user, ItemDeposit $itemDeposit): bool
    {
        return $itemDeposit->created_by == $user->id;
    }

    public function restore(User $user, ItemDeposit $itemDeposit): bool
    {
        return false;
    }

    public function forceDelete(User $user, ItemDeposit $itemDeposit): bool
    {
        return false;
    }
}
