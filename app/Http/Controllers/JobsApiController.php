<?php

namespace App\Http\Controllers;

use App\Models\JobApply;
use App\Models\JobList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsApiController extends Controller
{
    public function index()
    {
        $jobs = JobList::where('status', "active")->latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $jobs
        ], 200);
    }
    public function show($job)
    {
        $job = JobList::where('job_title', $job)->firstOrFail();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $job
        ], 200);
    }
    public function jobApply($job)
    {
        $job = JobList::where('job_title', $job)->firstOrFail();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $job
        ], 200);
    }
    public function jobApplyStore(Request $request, $job)
    {
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
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

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully.',
        ], 200);
    }
}