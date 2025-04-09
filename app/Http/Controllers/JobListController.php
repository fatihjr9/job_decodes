<?php

namespace App\Http\Controllers;

use App\Models\JobList;
use Illuminate\Http\Request;

class JobListController extends Controller
{
    public function jobIndex()
    {
        $jobs = JobList::latest()->get();
        return view('pages.admin.job.index', compact('jobs'));
    }

    public function jobCreate()
    {
        return view('pages.admin.job.create');
    }

    public function jobDetail($name)
    {
        $job = JobList::with('jobApply')->where('job_title', $name)->firstOrFail();
        return view('pages.admin.job.detail', compact('job'));
    }

    public function jobStore(Request $request)
    {

        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_logo' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'location' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'published_at' => 'required|date|after_or_equal:today',
            'expired_at' => 'required|date|after:published_at',
            'status' => 'required|string|max:255',
        ]);
        $data['description'] = $request->input('description', '');
        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = $request->file('company_logo')->store('logos', 'public');
        }
        // dd($data);

        JobList::create($data);

        return redirect()->route('admin-job-index')->with('success', 'Job created successfully.');
    }

    public function jobEdit($job)
    {
        $job = JobList::where('job_title', $job)->firstOrFail();
        return view('pages.admin.job.edit', compact('job'));
    }

    public function jobUpdate(Request $request, $job)
    {
        // dd($request->all());

        $job = JobList::where('job_title', $job)->firstOrFail();

        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'location' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'published_at' => 'required|date',
            'expired_at' => 'required|date|after:published_at',
            'status' => 'required|string|max:255',
        ]);
        $data['company_logo'] = $request->file('company_logo') ? $request->file('company_logo')->store('logos', 'public') : $job->company_logo;
        $data['description'] = $request->input('description', '');
        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = $request->file('company_logo')->store('logos', 'public');
        }

        $job->update($data);

        return redirect()->route('admin-job-index')->with('success', 'Job updated successfully.');
    }

    public function jobDestroy($name)
    {
        $job = JobList::where('job_title', $name)->firstOrFail();
        $job->delete();

        return redirect()->route('admin-job-index')->with('success', 'Job deleted successfully.');
    }
}
