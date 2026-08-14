<?php

namespace App\Http\Controllers\Admin;
use App\Models\Project;
use App\Models\ProjectPageDetail;
use App\Models\Tenant;
use App\Http\Requests\StoreProjectPageDetailRequest;
use App\Http\Requests\UpdateProjectPageDetailRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectPageDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $projectPageDetails = ProjectPageDetail::with('project')
            ->when($request->filled('search'), function ($query) use ($request) {

                $search = $request->search;

                $query->whereHas('project', function ($project) use ($search) {
                    $project->where('name', 'like', "%{$search}%");
                });

            })
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view(
            'admin.project-page-details.index',
            compact(
                'projectPageDetails',
                'perPage'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::where('status', true)
            ->orderBy('name')
            ->get();

        $tenants = Tenant::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.project-page-details.create',
            compact(
                'projects',
                'tenants'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectPageDetailRequest $request)
    {
        $validated = $request->validated();

        $projectPageDetail = ProjectPageDetail::create($validated);

        $tenants = collect($request->input('tenants', []))
            ->values()
            ->mapWithKeys(function ($tenantId, $index) {
                return [
                    $tenantId => [
                        'sort_order' => $index + 1,
                    ],
                ];
            });

        $projectPageDetail->tenants()->sync($tenants);

        return redirect()
            ->route('admin.project-page-details.index')
            ->with(
                'success',
                'Project Page Details created successfully.'
            );
    }

    public function show(ProjectPageDetail $projectPageDetail)
    {
        return redirect()
            ->route(
                'admin.project-page-details.edit',
                $projectPageDetail
            );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectPageDetail $projectPageDetail)
    {
        $projects = Project::where('status', true)
            ->orderBy('name')
            ->get();

        $tenants = Tenant::where('status', true)
            ->orderBy('name')
            ->get();

        $projectPageDetail->load('tenants');

        return view(
            'admin.project-page-details.edit',
            compact(
                'projectPageDetail',
                'projects',
                'tenants'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectPageDetailRequest $request,ProjectPageDetail $projectPageDetail) {
        $validated = $request->validated();
        $projectPageDetail->update($validated);
        $tenants = collect($request->input('tenants', []))->values()->mapWithKeys(function ($tenantId, $index) {
                return [
                    $tenantId => ['sort_order' => $index + 1,],
                ];
            });

        $projectPageDetail->tenants()->sync($tenants);

        return redirect()
            ->route('admin.project-page-details.index')
            ->with(
                'success',
                'Project Page Details updated successfully.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectPageDetail $projectPageDetail)
    {
        $projectPageDetail->delete();

        return redirect()->route('admin.project-page-details.index')->with('success','Project Page Details deleted successfully.');
    }
}
