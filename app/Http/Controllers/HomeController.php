<?php

namespace App\Http\Controllers;

use App\Models\PortfolioSetting;
use App\Models\Project;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index()
    {
        $settings = PortfolioSetting::pluck('value', 'key')->toArray();
        $projects = Project::latest()->take(3)->get();
        $technicalSkills = Skill::where('category', 'technical')->take(6)->get();
        $softSkills = Skill::where('category', 'soft')->take(6)->get();
        $languages = Skill::where('category', 'language')->take(6)->get();
        
        return view('portfolio.home', compact('settings', 'projects', 'technicalSkills', 'softSkills', 'languages'));
    }
} 