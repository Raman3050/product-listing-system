<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = \App\Models\HomePageUnitBanner::with(['project.pageDetails', 'unit'])
            ->where('status', true)
            ->orderBy('sort_order')
            ->get();

        $logos = \App\Models\HomePageProjectLogo::with('builder')
            ->where('status', true)
            ->orderBy('sort_order')
            ->get();

        $featuredProperties = \App\Models\HomePageFeaturedProperty::with(['project', 'unit.tenant', 'project.builder', 'project.location', 'project.propertyCategory', 'project.pageDetails'])
            ->where('status', true)
            ->orderBy('sort_order')
            ->get();

        $projects = \App\Models\Project::with(['location', 'propertyCategory', 'units', 'pageDetails', 'builder'])
            ->where('status', true)
            ->latest()
            ->get();

        return view('frontend.home.index', compact('banners', 'logos', 'featuredProperties', 'projects'));
    }
}
