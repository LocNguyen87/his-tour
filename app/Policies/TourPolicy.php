<?php

namespace App\Policies;

use App\User;
use App\Tour;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class TourPolicy
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
    public function viewAny($user)
    {
        return Gate::any(['viewTour', 'manageTour'], $user);
    }

    public function view($user, Tour $tour)
    {
        return Gate::any(['viewTour', 'manageTour'], $user, $tour);
    }

    public function create($user)
    {
        return $user->can('manageTour');
    }

    public function update($user, Tour $tour)
    {
        return $user->can('manageTour', $tour);
    }

    public function delete($user, Tour $tour)
    {
        return $user->can('manageTour', $tour);
    }

    public function restore($user, Tour $tour)
    {
        return $user->can('manageTour', $tour);
    }

    public function forceDelete($user, Tour $tour)
    {
        return $user->can('manageTour', $tour);
    }
}
