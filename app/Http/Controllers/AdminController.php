<?php

namespace App\Http\Controllers;

use App\Models\JobApply;
use App\Models\JobList;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $jobs = JobList::get()->count();
        $applicants = JobApply::count();
        $users = User::where('role', 'user')->count();
        return view('pages.admin.dashboard', compact('jobs', 'applicants', 'users'));
    }
    public function manageUser()
    {
        $users = User::all();
        return view('pages.admin.manageUser.index', compact('users'));
    }
    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.manageUser.edit', compact('user'));
    }
    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string|max:255',
        ]);

        $user->update($data);

        return redirect()->route('admin-manage-user')->with('success', 'User updated successfully.');
    }
}
