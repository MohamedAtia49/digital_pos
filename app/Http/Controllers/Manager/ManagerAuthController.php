<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;


class ManagerAuthController extends Controller
{
    public function login(Request $request){
            DB::purge('tenant');
            DB::purge('landlord');
            Config::set('database.default','landlord');
            DB::reconnect('landlord');
            DB::setDefaultConnection('landlord');

            if (!Auth::guard('manager')->attempt(['email' => $request->email,
                'password' => $request->password], $request->remember )){
                    throw ValidationException::withMessages([
                        'email' => trans('auth.failed'),
                    ]);
            }

            // Redirect on success
            return to_route('dashboard.index');
    }


    public function logout()
    {
        Auth::guard('manager')->logout();
        session()->forget('guard.manager');
        session()->regenerateToken();
        return to_route('manager.get.login');
    }
}
