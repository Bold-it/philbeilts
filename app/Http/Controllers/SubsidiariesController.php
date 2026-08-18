<?php
namespace App\Http\Controllers;
class SubsidiariesController extends Controller {
    public function index() {
        $subsidiaries = HomeController::getSubsidiaries();
        return view('subsidiaries', compact('subsidiaries'));
    }
}
