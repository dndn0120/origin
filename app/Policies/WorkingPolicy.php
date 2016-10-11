<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Working;

class WorkingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function destroy(User $user, Working $working)
    {
        return $user->id === $working->user_id;
    }
    public function update(User $user, Working $working)
    {
        return $user->id === $working->user_id;
    }
}
