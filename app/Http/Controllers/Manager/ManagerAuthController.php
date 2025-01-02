<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagerAuthController extends Controller
{
    public function login(Request $request){
            // Query the landlord database to find the manager by email
            $manager = DB::connection('landlord')->table('managers')->where('email', $request->email)->first();
            // dd( $manager);
            if (!$manager) {
                // If the manager doesn't exist, throw a validation exception
                throw ValidationException::withMessages([
                    'email' => 'Manager not found in the system.',
                ]);
            }

            // Get only email and password from the request
            $credentials = $request->only('email', 'password');
            // dd($request->all());
            // Check if "remember me" is set
            $remember = $request->has('remember');

            // Attempt authentication using the Auth guard for "manager"
            if (!Auth::guard('manager')->attempt($credentials, $remember)) {
                dd('failed');
            }

            // Redirect on success
            return to_route('manager.dashboard.index');

    }


    public function logout()
    {
        Auth::guard('manager')->logout();
        session()->forget('guard.manager');
        session()->regenerateToken();
        return to_route('manager.get.login');
    }
}
