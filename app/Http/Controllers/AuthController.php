<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\OtpRequest;
use App\Interfaces\AuthenticationInterfaces;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
private AuthenticationInterfaces $authInterface;
public function __construct(AuthenticationInterfaces $authInterface)
{
    $this->authInterface = $authInterface;
}

public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $request->email)->first();

        if ($this->authInterface->login($data)) {

            if ($user->role == false) {
                return redirect()->route('users.use_dashbord');
            }

            return redirect()->route('dashbord');
        } else {
            return back()->with('error', 'Email ou mot de passe incorrect(s).');
        }
        // try {

        // } catch (\Exception $ex) {
        //     return back()->with('error', 'Une erreur est survnue lors du traitement, Réessayez !');
        // }

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
