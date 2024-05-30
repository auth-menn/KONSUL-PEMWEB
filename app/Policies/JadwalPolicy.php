<?php

namespace App\Policies;

use App\Models\User;
use App\Models\dokter;
use Illuminate\Auth\Access\HandlesAuthorization;

class JadwalPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    public function browse(User $user)
    {
        return $user->hasRole('dokter');
    }


    public function read(User $user, Schedule $schedule)
    {
        if (empty($jadwal->dokter)) {
            return false;
        }

        return $user->id == $schedule->dokter->nama;
    }

    /**
     * Determine whether the user can update the Product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function edit(User $user, Product $product)
    {
        if(empty($schedule->dokter)) {
            return false;
        }

        return $user->id == $schedule->dokter->nama;
    }


    /**
     * Determine whether the user can create Products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function add(User $user)
    {
        //return $user->hasRole('seller');
        true;
    }

    /**
     * Determine whether the user can delete the Product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        if (empty($schedule->dokter)) {
            return false;
        }

        return $user->id == $schedule->dokter->nama;
    }
}
