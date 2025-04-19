<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioSetting;

class PortfolioController extends Controller
{
    public function index()
    {
        $settings = PortfolioSetting::pluck('value', 'key')->toArray();
        return view('portfolio.index', compact('settings'));
    }

    public function about()
    {
        $settings = PortfolioSetting::pluck('value', 'key')->toArray();
        return view('portfolio.about', compact('settings'));
    }

    public function projects()
    {
        $settings = PortfolioSetting::pluck('value', 'key')->toArray();
        return view('portfolio.projects', compact('settings'));
    }

    public function contact()
    {
        $settings = PortfolioSetting::pluck('value', 'key')->toArray();
        return view('portfolio.contact', compact('settings'));
    }
} 