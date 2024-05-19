<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Assets;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssetsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_assets');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assets  $assets
     * @return bool
     */
    public function view(User $user, Assets $assets): bool
    {
        return $user->can('view_assets');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_assets');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assets  $assets
     * @return bool
     */
    public function update(User $user, Assets $assets): bool
    {
        return $user->can('update_assets');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assets  $assets
     * @return bool
     */
    public function delete(User $user, Assets $assets): bool
    {
        return $user->can('delete_assets');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_assets');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assets  $assets
     * @return bool
     */
    public function forceDelete(User $user, Assets $assets): bool
    {
        return $user->can('force_delete_assets');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_assets');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assets  $assets
     * @return bool
     */
    public function restore(User $user, Assets $assets): bool
    {
        return $user->can('restore_assets');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_assets');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assets  $assets
     * @return bool
     */
    public function replicate(User $user, Assets $assets): bool
    {
        return $user->can('replicate_assets');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_assets');
    }

}
