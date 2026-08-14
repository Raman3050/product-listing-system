<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectImageRequest;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectImageController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::where('status', true)
            ->orderBy('name')
            ->get();

        $selectedProject = null;
        $projectImages = collect();

        if ($request->filled('project_id')) {

            $selectedProject = Project::findOrFail($request->project_id);

            $projectImages = $selectedProject->images()
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();
        }

        return view(
            'admin.project-images.index',
            compact(
                'projects',
                'selectedProject',
                'projectImages'
            )
        );
    }

    public function store(StoreProjectImageRequest $request)
    {
        DB::transaction(function () use ($request) {

            $project = Project::findOrFail($request->project_id);

            $nextSortOrder = $project->images()->max('sort_order') ?? 0;

            foreach ($request->file('images') as $image) {

                $nextSortOrder++;

                $project->images()->create([

                    'image' => $this->uploadFile($image),

                    'sort_order' => $nextSortOrder,

                ]);
            }

        });

        return redirect()
            ->route('admin.project-images.index', [
                'project_id' => $request->project_id,
            ])
            ->with('success', 'Images uploaded successfully.');
    }

    public function destroy(ProjectImage $projectImage)
    {
        $projectId = $projectImage->project_id;

        $this->deleteFile($projectImage->image);

        $projectImage->delete();

        return redirect()
            ->route('admin.project-images.index', [
                'project_id' => $projectId,
            ])
            ->with('success', 'Image deleted successfully.');
    }

    private function uploadFile($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('projects/gallery', $filename, 'public');
    }

    private function deleteFile(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}