<?php
namespace App\Http\Controllers;
class IndustriesController extends Controller {
    public function index() {
        $industries = HomeController::getIndustries();
        return view('industries.index', compact('industries'));
    }
    public function show($slug) {
        $industries = HomeController::getIndustries();
        $industry = collect($industries)->firstWhere('slug', $slug);
        if (!$industry) abort(404);
        return view('industries.show', compact('industry', 'industries'));
    }
}
