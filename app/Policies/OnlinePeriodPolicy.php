<?php

namespace App\Policies;

use App\Models\OnlinePeriod;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OnlinePeriodPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OnlinePeriod  $onlinePeriod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, OnlinePeriod $onlinePeriod)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        
        if ($user->role=="team") return true;
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OnlinePeriod  $onlinePeriod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, OnlinePeriod $onlinePeriod)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OnlinePeriod  $onlinePeriod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, OnlinePeriod $onlinePeriod)
    {
        
        if ($user->isAdmin()) return true;
        if ($user->id==$onlinePeriod->team->user_id) return true;


        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OnlinePeriod  $onlinePeriod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, OnlinePeriod $onlinePeriod)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OnlinePeriod  $onlinePeriod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, OnlinePeriod $onlinePeriod)
    {
        //
    }
}
