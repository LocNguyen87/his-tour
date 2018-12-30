<?php

namespace App\Policies;

use App\User;
use App\Registration;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class RegistrationPolicy
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
        return Gate::any(['viewRegistrationData', 'manageRegistration', 'viewPersonalData'], $user);
    }

    public function view($user, Registration $registration)
    {
        return Gate::any(['viewRegistrationData', 'manageRegistration', 'viewPersonalData'], $user, $registration);
    }

    public function create($user)
    {
        return $user->can('manageRegistration');
    }

    public function update($user, Registration $registration)
    {
        return $user->can('manageRegistration', $registration);
    }

    public function delete($user, Registration $registration)
    {
        return $user->can('manageRegistration', $registration);
    }

    public function restore($user, Registration $registration)
    {
        return $user->can('manageRegistration', $registration);
    }

    public function forceDelete($user, Registration $registration)
    {
        return $user->can('manageRegistration', $registration);
    }
}
