<?php

namespace App\Http\Controllers;

use App\Models\JobApply;
use App\Models\JobList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $jobs = JobList::where('status', "active")->latest()->get();
        return view('pages.index', compact('jobs'));
    }
    public function show($job)
    {
        $job = JobList::where('job_title', $job)->firstOrFail();
        $hasApplied = false;
        if (Auth::check()) {
            $hasApplied = $job->jobApply()->where('user_id', Auth::id())->exists();
        }
        $jobPreference = JobList::where('job_title','!=',$job->job_title)->latest()->take(4)->get();
        return view('pages.detail', compact('job','jobPreference', 'hasApplied'));
    }
    public function jobApply($job)
    {
        $job = JobList::where('job_title', $job)->firstOrFail();
        return view('pages.apply', compact('job'));
    }
    public function jobApplyStore(Request $request, $job)
    {
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|string|max:1000',
        ]);
        $userId = Auth::check() ? Auth::id() : null;
        $job = JobList::where('job_title', $job)->firstOrFail();
        $photoPath = $request->file('photo')->store('photos', 'public');
        $cvPath    = $request->file('cv')->store('cvs', 'public');

        JobApply::create([
            'job_list_id' => $job->id,
            'user_id' => $userId,
            'photo' => $photoPath,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'cv' => $cvPath,
            'cover_letter' => $data['cover_letter'] ?? null,
        ]);

        // dd($data);

        return redirect()->route('home')->with('success', 'Application submitted successfully.');
    }
}
