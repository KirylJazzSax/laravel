<?php

namespace App\Policies;

use App\Record;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecordPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any records.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the record.
     *
     * @param  \App\User  $user
     * @param  \App\Record  $record
     * @return mixed
     */
    public function view(User $user, Record $record)
    {
        //
    }

    /**
     * Determine whether the user can create records.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
//        return true;
    }

    /**
     * Determine whether the user can update the record.
     *
     * @param  \App\User  $user
     * @param  \App\Record  $record
     * @return mixed
     */
    public function update(User $user, Record $record)
    {
        return $user->id === $record->user_id;
    }

    /**
     * Determine whether the user can delete the record.
     *
     * @param  \App\User  $user
     * @param  \App\Record  $record
     * @return mixed
     */
    public function delete(User $user, Record $record)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the record.
     *
     * @param  \App\User  $user
     * @param  \App\Record  $record
     * @return mixed
     */
    public function restore(User $user, Record $record)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the record.
     *
     * @param  \App\User  $user
     * @param  \App\Record  $record
     * @return mixed
     */
    public function forceDelete(User $user, Record $record)
    {
        //
    }
}
