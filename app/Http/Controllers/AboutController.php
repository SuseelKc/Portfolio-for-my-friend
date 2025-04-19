<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Experience;
use App\Models\PortfolioSetting;

class AboutController extends Controller
{
    public function index()
    {
        $settings = PortfolioSetting::pluck('value', 'key')->toArray();
        $technicalSkills = Skill::where('category', 'technical')->get();
        $softSkills = Skill::where('category', 'soft')->get();
        $languages = Skill::where('category', 'language')->get();
        $experiences = Experience::get();   
        
        return view('portfolio.about', compact('settings', 'technicalSkills', 'softSkills', 'languages','experiences'));
    }
} 