<?php

namespace App\Http\Controllers;

use App\Models\JobListing;

class CareersController extends Controller
{
    public function index()
    {
        $jobs = JobListing::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('careers', compact('jobs'));
    }
}
