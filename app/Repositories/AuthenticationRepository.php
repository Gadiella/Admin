<?php

namespace App\Repositories;

use App\Interfaces\AuthenticationInterfaces;
use App\Models\OtpCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationRepository implements AuthenticationInterfaces
{
    /**
     * Create a new class instance.
     */
    public function login($data)
    {
        return Auth::attempt($data);
    }

    public function checkOtpCode(array $data)
    {
        $code = OtpCode::where('email', $data['email'])->first();

        if ($code)
            if (!Hash::check($data['code'], $code->code)) return false;
        session()->put('code', $data['code']);
        return $code;
    }

}
