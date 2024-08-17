<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {

        if (Auth::check()) {

            return redirect()->route('dashbord');
        }
        return view('login');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function checkOtpCode()
    {

        if (Auth::check()) {

            return redirect()->route('dashbord');
        }
        return view('otp');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
