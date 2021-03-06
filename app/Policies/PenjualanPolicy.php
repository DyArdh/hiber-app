<?php

namespace App\Policies;

use App\Models\User;
use App\Models\penjualan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PenjualanPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return in_array($user->role, ['Owner', 'Admin']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role == 'Admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->role == 'Admin';
    }
}
