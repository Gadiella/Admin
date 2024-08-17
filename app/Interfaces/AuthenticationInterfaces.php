<?php

namespace App\Interfaces;

interface AuthenticationInterfaces
{
    public function login(array $data);

    public function CheckOtpCode(array $data);
   
}
