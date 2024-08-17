<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\OtpRequest;
use App\Interfaces\AuthenticationInterfaces;

class AuthController extends Controller
{
private AuthenticationInterfaces $authInterface;
public function __construct(AuthenticationInterfaces $authInterface)
{
    $this->authInterface = $authInterface;
}

public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {

            if ($this->authInterface->login($data))
                return redirect()->route('dashbord');
            else
                return back()->with('error', 'Email ou mot de passe incorrect(s).');
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survnue lors du traitement, Réessayez !');
        }

    } 

    public function check0tpCode(OtpRequest $request)
    {
        $data = [
            'email' => $request->email,
            'code' => $request->code,

        ];
        try {

            $code = $this->authInterface->checkOtpCode($data);
            if (!$code)
                return back()->with('error', 'Code de confirmation invalide.');
            else
                return redirect()->route('newPassword');
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survnue lors du traitement, Réessayez !');
        }
    }
}
