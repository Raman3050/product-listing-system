<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAmenityRequest;
use App\Http\Requests\UpdateAmenityRequest;
use App\Models\Amenity;
use Illuminate\Support\Facades\Storage;


class AmenityController extends Controller
{
    public function index()
    {
        $perPage = request('per_page', 10);

        $amenities = Amenity::query()

            ->when(request('search'), function ($query) {

                $query->where('name', 'like', '%' . request('search') . '%');

            })

            ->latest()

            ->paginate($perPage)

            ->withQueryString();

        return view(
            'admin.amenities.index',
            compact('amenities', 'perPage')
        );
    }

    public function create()
    {
        return view('admin.amenities.create');
    }

    public function store(StoreAmenityRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = !empty($validated['slug'])
            ? $validated['slug']
            : SlugHelper::generate($validated['name'], Amenity::class);

        $validated['status'] = $request->boolean('status');

        Amenity::create($validated);

        return redirect()
            ->route('admin.amenities.index')
            ->with('success', 'Amenity created successfully.');
    }

    public function edit(Amenity $amenity)
    {
        return view(
            'admin.amenities.edit',
            compact('amenity')
        );
    }

    public function update(UpdateAmenityRequest $request, Amenity $amenity)
    {
        $validated = $request->validated();

        $validated['status'] = $request->boolean('status');

        $amenity->update($validated);

        return redirect()
            ->route('admin.amenities.index')
            ->with('success', 'Amenity updated successfully.');
    }

    public function destroy(Amenity $amenity)
    {
        $amenity->delete();

        return redirect()
            ->route('admin.amenities.index')
            ->with('success', 'Amenity deleted successfully.');
    }
}