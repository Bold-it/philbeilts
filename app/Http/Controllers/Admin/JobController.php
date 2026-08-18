<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobListing::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'employment_type' => 'required|string|max:50',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        JobListing::create($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job position created successfully!');
    }

    public function edit(JobListing $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, JobListing $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'employment_type' => 'required|string|max:50',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $job->update($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job position updated successfully!');
    }

    public function toggle(JobListing $job)
    {
        $job->update(['is_active' => !$job->is_active]);
        return back()->with('success', 'Job status toggled successfully.');
    }

    public function destroy(JobListing $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job position deleted successfully.');
    }
}
