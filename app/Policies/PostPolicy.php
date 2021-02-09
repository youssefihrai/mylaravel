<?php

namespace App\Policies;

use App\Entreprise;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(Entreprise $user)
    {
        return   true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Entreprise  $entreprise
     * @return mixed
     */
    public function view(Entreprise $user, Post $entreprise)
    {
        return   true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Entreprise $user)
    {
        return   true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Entreprise  $entreprise
     * @return mixed
     */
    public function update(Entreprise $user, Post $entreprise)
    {
        return   true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Entreprise  $entreprise
     * @return mixed
     */
    public function delete(Entreprise $user, Post $entreprise)
    {
        return   true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Entreprise  $entreprise
     * @return mixed
     */
    public function restore(Entreprise $user,Post  $post)
    {
        return   true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Entreprise  $entreprise
     * @return mixed
     */
    public function forceDelete(Entreprise $user,Post  $post)
    {
        return   true;
    }
}
