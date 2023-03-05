<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Appointment $queueNumber): bool
    {
        return $user->hasPermissionTo('view appointment') || $queueNumber->created_by == $user->id;
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create appointment');
    }

    public function update(User $user, Appointment $queueNumber): bool
    {
        return $user->hasRole('admin') || $queueNumber->created_by == $user->id;
    }

    public function delete(User $user, Appointment $queueNumber): bool
    {
        return $user->hasRole('admin') || $queueNumber->created_by == $user->id;
    }

    public function restore(User $user, Appointment $queueNumber): bool
    {
        return false;
    }

    public function forceDelete(User $user, Appointment $queueNumber): bool
    {
        return false;
    }
}
