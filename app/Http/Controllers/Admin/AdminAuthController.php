<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request){
        if (!Auth::guard('web')->attempt(['email' => $request->email,
        'password' => $request->password], $request->remember )){
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
        return to_route('dashboard.index');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        session()->forget('guard.web');
        session()->regenerateToken();
        return to_route('admin.get.login');
    }

}
