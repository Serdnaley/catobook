<?php

namespace App\Policies;

use App\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->has_role([
            'admin',
            'user',
        ]);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\User $user
     * @param \App\Comment $comment
     * @return mixed
     */
    public function view(User $user, Comment $comment)
    {
        return $user->has_role([
            'admin',
            'user',
        ]);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->has_role([
            'admin',
            'user',
        ]);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\User $user
     * @param \App\Comment $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        if ($user->id === $comment->author_id) return true;
        return $user->has_role([
            'admin',
        ]);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\User $user
     * @param \App\Comment $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->has_role([
            'admin',
        ]);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\User $user
     * @param \App\Comment $comment
     * @return mixed
     */
    public function restore(User $user, Comment $comment)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\User $user
     * @param \App\Comment $comment
     * @return mixed
     */
    public function forceDelete(User $user, Comment $comment)
    {
        return false;
    }
}
