<?php

namespace App\Http\Controllers;

use App\Models\PortfolioSetting;
use App\Models\Project;
use App\Models\Skill;

class ProjectsController extends Controller
{
    public function index()
    {
        $settings = PortfolioSetting::pluck('value', 'key')->toArray();
        $projects = Project::latest()->get();
        $softSkills = Skill::where('category', 'soft')->get();
        $languages = Skill::where('category', 'language')->get();
        
        return view('portfolio.projects', compact('settings', 'projects', 'softSkills', 'languages'));
    }

    public function add(){

    }

    public function store(){

    }

    public function delete(){
        
    }
} 