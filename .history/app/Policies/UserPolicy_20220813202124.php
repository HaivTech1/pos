<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    const ADMIN = 'admin';
    const MANAGER = 'manager';
    const BAN = 'ban';
    const DELETE = 'delete';
    const STAFF = 'staff';

    public function admin(User $user): bool
    {
        return $user->isAdmin();
    }

    public function manager(User $user): bool
    {
        return $user->isManager() || $user->isAdmin();
    }

    public function staff(User $user): bool
    {
        return $user->isStaff();
    }

    public function ban(User $user, User $subject): bool
    {
        return ($user->isAdmin());
    }

    public function delete(User $user, User $subject)
    {
        return ($user->isAdmin() || $user->matches($subject)) && !$subject->isAdmin();
    }
}