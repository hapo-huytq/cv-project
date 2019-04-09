<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        $countUsers = User::count();
        $countHRs = Admin::where('type', 3)->count();
        $countAdmins = Admin::where('type', 2)->count();
        return view('admin.pages.dashboard', compact('countAdmins', 'countHRs', 'countUsers'));
    }
}
