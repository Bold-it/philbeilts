<?php
namespace App\Http\Controllers;
class AboutController extends Controller {
    public function index() {
        $industries = HomeController::getIndustries();
        return view('about', compact('industries'));
    }
}
