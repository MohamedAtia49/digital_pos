<?php

namespace App\Http\Controllers\Manger;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MangerAuthController extends Controller
{
    public function login(Request $request){

        // Attempt to authenticate
        try {
            if (!Auth::guard('manger')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ], $request->remember)) {
                throw ValidationException::withMessages([
                    'email' => trans('auth.failed'),
                ]);
            }
        } catch (\Exception $e) {
            // Debug exception
            dd($e->getMessage());
        }

        // Redirect on success
        return to_route('manger.dashboard.index');
    }


    public function logout()
    {
        Auth::guard('manger')->logout();
        session()->forget('guard.manger');
        session()->regenerateToken();
        return to_route('manger.get.login');
    }
}
