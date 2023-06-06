<?php

namespace App\Policies;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompetitionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Competition $competition)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->isAdmin()) return true;

        if ($user->role=="organiser") return true;
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Competition $competition)
    {
        if ($user->isAdmin()) return true;
        if ($this->isOrganiserOfCompetition($user, $competition)) return true;
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Competition $competition)
    {
        if ($user->isAdmin()) return true;
        if ($this->isOrganiserOfCompetition($user, $competition)) return true;
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Competition $competition)
    {
        if ($user->isAdmin()) return true;
        if ($this->isOrganiserOfCompetition($user, $competition)) return true;
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Competition $competition)
    {
        if ($user->isAdmin()) return true;
        if ($this->isOrganiserOfCompetition($user, $competition)) return true;
        return false;
    }
    
    public function isOrganiserOfCompetition(User $user, Competition $competition){
        return ($user->role=="organiser" && $competition->organiser_id==$user->id);
        
    }
}
