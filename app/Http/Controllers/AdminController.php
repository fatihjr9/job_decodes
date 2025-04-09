<?php

namespace App\Http\Controllers;

use App\Models\JobApply;
use App\Models\JobList;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    public function userCreate()
    {
        return view('pages.admin.manageUser.create');
    }
    public function userStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255',
        ]);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('admin-manage-user')->with('success', 'User created successfully.');
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
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255',
        ]);
        $data['password'] = Hash::make($data['password']);

        $user->update($data);

        return redirect()->route('admin-manage-user')->with('success', 'User updated successfully.');
    }
}
