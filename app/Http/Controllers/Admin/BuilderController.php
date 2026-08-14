<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuilderRequest;
use App\Http\Requests\UpdateBuilderRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Builder;

class BuilderController extends Controller
{
    public function index()
    {
        $perPage = request('per_page', 10);

        $builders = Builder::query()

            ->when(request('search'), function ($query) {

                $query->where('name', 'like', '%' . request('search') . '%');

            })

            ->latest()

            ->paginate($perPage)

            ->withQueryString();

        return view(
            'admin.builders.index',
            compact('builders', 'perPage')
        );
    }

    public function create()
    {
        return view('admin.builders.create');
    }

    public function store(StoreBuilderRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = !empty($validated['slug'])
            ? $validated['slug']
            : SlugHelper::generate($validated['name'], Builder::class);

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            $validated['logo'] = $file->storeAs('builders', $filename, 'public');
        }

        $validated['status'] = $request->boolean('status');

        Builder::create($validated);

        return redirect()
            ->route('admin.builders.index')
            ->with('success', 'Builder created successfully.');
    }

    public function edit(Builder $builder)
    {
        return view(
            'admin.builders.edit',
            compact('builder')
        );
    }

    public function update(UpdateBuilderRequest $request, Builder $builder)
    {
        $validated = $request->validated();

        if ($request->hasFile('logo')) {

            if (
                $builder->logo &&
                Storage::disk('public')->exists($builder->logo)
            ) {

                Storage::disk('public')->delete($builder->logo);

            }

            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            $validated['logo'] = $file->storeAs('builders', $filename, 'public');
        }

        $validated['status'] = $request->boolean('status');

        $builder->update($validated);

        return redirect()
            ->route('admin.builders.index')
            ->with('success', 'Builder updated successfully.');
    }

    public function destroy(Builder $builder)
    {
        if (
            $builder->logo &&
            Storage::disk('public')->exists($builder->logo)
        ) {

            Storage::disk('public')->delete($builder->logo);

        }

        $builder->delete();

        return redirect()
            ->route('admin.builders.index')
            ->with('success', 'Builder deleted successfully.');
    }
}