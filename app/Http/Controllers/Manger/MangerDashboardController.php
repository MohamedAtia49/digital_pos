<?php

namespace App\Http\Controllers\Manger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MangerDashboardController extends Controller
{
    public function index()
    {
        return view('manger_dashboard.welcome');
    }
}
