<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Builder;
use App\Models\Location;
use App\Models\Project;
use App\Models\PropertyCategory;
use App\Models\Amenity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $projects = Project::query()

            ->when($request->filled('search'), function ($query) use ($request) {

                $search = $request->search;

                $query->where(function ($q) use ($search) {

                    $q->where('name', 'like', "%{$search}%")
                        ->orWhereHas('builder', function ($builder) use ($search) {
                            $builder->where('name', 'like', "%{$search}%");
                        })
                        ->orWhereHas('location', function ($location) use ($search) {
                            $location->where('name', 'like', "%{$search}%");
                        });

                });

            })

            ->when($request->filled('builder_id'), function ($query) use ($request) {

                $query->where('builder_id', $request->builder_id);

            })

            ->when($request->filled('property_category_id'), function ($query) use ($request) {

                $query->where('property_category_id', $request->property_category_id);

            })

            ->when($request->filled('location_id'), function ($query) use ($request) {

                $query->where('location_id', $request->location_id);

            })

            ->when($request->filled('status'), function ($query) use ($request) {

                $query->where('status', $request->status);

            })

            ->latest()

            ->paginate($perPage)

            ->withQueryString();

        $builders = Builder::where('status', true)->orderBy('name')->get();

        $categories = PropertyCategory::where('status', true)->orderBy('name')->get();

        $locations = Location::where('status', true)->orderBy('name')->get();

        return view(
            'admin.projects.index',
            compact(
                'projects',
                'builders',
                'categories',
                'locations',
                'perPage'
            )
        );
    }

    public function create()
    {
        $categories = PropertyCategory::where('status', true)
            ->orderBy('name')
            ->get();

        $builders = Builder::where('status', true)
            ->orderBy('name')
            ->get();

        $locations = Location::where('status', true)
            ->orderBy('name')
            ->get();

        $amenities = Amenity::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.projects.create',
            compact(
                'categories',
                'builders',
                'locations',
                'amenities'
            )
        );
    }

    public function store(StoreProjectRequest $request)
    {
        DB::transaction(function () use ($request) {

            $validated = $request->validated();

            // Generate Slug
            $validated['slug'] = !empty($validated['slug'])
                ? $validated['slug']
                : SlugHelper::generate($validated['name'], Project::class);

            // Upload Logo
            if ($request->hasFile('logo')) {
                $validated['logo'] = $this->uploadFile(
                    $request->file('logo'),
                    'projects/logos'
                );
            }

            // Upload Featured Image
            if ($request->hasFile('featured_image')) {
                $validated['featured_image'] = $this->uploadFile(
                    $request->file('featured_image'),
                    'projects/featured-images'
                );
            }

            // Upload Brochure
            if ($request->hasFile('brochure')) {
                $validated['brochure'] = $this->uploadFile(
                    $request->file('brochure'),
                    'projects/brochures'
                );
            }

            $validated['status'] = $request->boolean('status');

            $project = Project::create($validated);

            $project->amenities()->sync(
                $request->input('amenities', [])
            );
        });

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $categories = PropertyCategory::where('status', true)
            ->orderBy('name')
            ->get();

        $builders = Builder::where('status', true)
            ->orderBy('name')
            ->get();

        $locations = Location::where('status', true)
            ->orderBy('name')
            ->get();

        $amenities = Amenity::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.projects.edit',
            compact(
                'project',
                'categories',
                'builders',
                'locations',
                'amenities'
            )
        );
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        DB::transaction(function () use ($request, $project) {

            $validated = $request->validated();

            $validated['slug'] = !empty($validated['slug'])
                ? $validated['slug']
                : SlugHelper::generate($validated['name'], Project::class, $project->id);

            // Logo
            if ($request->hasFile('logo')) {

                $this->deleteFile($project->logo);

                $validated['logo'] = $this->uploadFile(
                    $request->file('logo'),
                    'projects/logos'
                );
            }

            // Featured Image
            if ($request->hasFile('featured_image')) {

                $this->deleteFile($project->featured_image);

                $validated['featured_image'] = $this->uploadFile(
                    $request->file('featured_image'),
                    'projects/featured-images'
                );
            }

            // Brochure
            if ($request->hasFile('brochure')) {

                $this->deleteFile($project->brochure);

                $validated['brochure'] = $this->uploadFile(
                    $request->file('brochure'),
                    'projects/brochures'
                );
            }

            $validated['status'] = $request->boolean('status');

            $project->update($validated);

            $project->amenities()->sync(
                $request->input('amenities', [])
            );

        });

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        DB::transaction(function () use ($project) {

            $this->deleteFile($project->logo);

            $this->deleteFile($project->featured_image);

            $this->deleteFile($project->brochure);

            $project->amenities()->detach();

            $project->delete();

        });

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    private function uploadFile($file, string $directory): string
    {
        return $file->store($directory, 'public');
    }

    private function deleteFile(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}