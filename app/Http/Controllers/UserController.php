<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.user.dashboard');
    }
    public function applicationHistory()
    {
        $user = Auth::user();
        $jobs = User::with('jobApply.jobList')->latest()->where('id', $user->id)->first();
        return view('pages.user.history', compact('jobs'));
    }
}
