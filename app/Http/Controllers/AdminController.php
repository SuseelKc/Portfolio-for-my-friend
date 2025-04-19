<?php

namespace App\Http\Controllers;

use App\Models\PortfolioSetting;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard()
    {
        $settings = PortfolioSetting::pluck('value', 'key')->toArray();
        $projects = Project::latest()->get();
        $skills = Skill::latest()->get();
        return view('admin.dashboard', compact('settings', 'projects', 'skills'));
    }

    public function settings()
    {
        $settings = PortfolioSetting::pluck('value', 'key')->toArray();
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('portfolio', 'public');
                
                // Delete old file if exists
                $oldSetting = PortfolioSetting::where('key', $key)->first();
                if ($oldSetting && $oldSetting->value) {
                    Storage::disk('public')->delete($oldSetting->value);
                }
                
                $value = $path;
            }
            
            PortfolioSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

    public function projects()
    {
        $projects = Project::latest()->get();
        return view('admin.projects', compact('projects'));
    }

    public function storeProject(Request $request)
    {
        

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'link' => 'nullable|url',
            'github_link' => 'nullable|url',
        ]);

        

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);
        

        return redirect()->back()->with('success', 'Project added successfully!');
    }

    public function deleteProject(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return redirect()->back()->with('success', 'Project deleted successfully!');
    }

    public function skills()
    {
        $skills = Skill::latest()->get();
        return view('admin.skills', compact('skills'));
    }

    public function storeSkill(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'category' => 'required|string|max:255',
        ]);

        Skill::create($validated);

        return redirect()->back()->with('success', 'Skill added successfully!');
    }

    public function deleteSkill(Skill $skill)
    {
        $skill->delete();
        return redirect()->back()->with('success', 'Skill deleted successfully!');
    }
} 