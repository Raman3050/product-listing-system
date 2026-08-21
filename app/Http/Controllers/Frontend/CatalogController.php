<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Unit;
use App\Models\Builder;

class CatalogController extends Controller
{
    public function index()
    {
        $projects = Project::with([
            'builder',
            'location',
            'propertyCategory',
            'images',
        ])
        ->where('status', true)
        ->latest()
        ->get();

        return view(
            'frontend.catalog.list',
            compact('projects')
        );
    }


    public function builderShow(string $builderSlug)
    {
        $builder = Builder::with([
            'projects.location',
            'projects.propertyCategory',
            'projects.units',
            'projects.pageDetails'
        ])
        ->where('slug', $builderSlug)
        ->where('status', true)
        ->firstOrFail();

        return view(
            'frontend.builder.show',
            compact('builder')
        );
    }

    public function projectShow(string $builderSlug, string $projectSlug)
    {
        $project = Project::with([
            'builder',
            'location',
            'propertyCategory',
            'images',
            'amenities',
            'units.tenant',
            'units.features',
            'units.images',
        ])
        ->whereHas('builder', function($q) use ($builderSlug) {
            $q->where('slug', $builderSlug);
        })
        ->where('slug', $projectSlug)
        ->where('status', true)
        ->firstOrFail();

        return view(
            'frontend.catalog.index',
            compact('project')
        );
    }

    public function unitShow(string $builderSlug, string $projectSlug, string $unitSlug)
    {
        $project = Project::with([
            'builder',
            'location',
            'propertyCategory',
            'images',
            'amenities',
            'units.tenant',
            'units.features',
            'units.images',
        ])
        ->whereHas('builder', function($q) use ($builderSlug) {
            $q->where('slug', $builderSlug);
        })
        ->where('slug', $projectSlug)
        ->where('status', true)
        ->firstOrFail();

        $unit = $project->units()
            ->with(['tenant', 'features', 'images'])
            ->where('slug', $unitSlug)
            ->where('status', true)
            ->firstOrFail();

        return view(
            'frontend.catalog.show',
            compact('project', 'unit')
        );
    }
}
