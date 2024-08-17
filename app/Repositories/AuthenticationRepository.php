<?php

namespace App\Repositories;

use App\Interfaces\AuthenticationInterfaces;
use Illuminate\Support\Facades\Auth;

class AuthenticationRepository implements AuthenticationInterfaces
{
    /**
     * Create a new class instance.
     */
    public function login($data)
    {
        return Auth::attempt($data);
    }
}
