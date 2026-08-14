<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $tenants = Tenant::query()

            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })

            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view(
            'admin.tenants.index',
            compact('tenants', 'perPage')
        );
    }

    public function create()
    {
        return view('admin.tenants.create');
    }

    public function store(StoreTenantRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = !empty($validated['slug'])
            ? $validated['slug']
            : SlugHelper::generate($validated['name'], Tenant::class);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request
                ->file('logo')
                ->store('tenants/logos');
        }

        $validated['status'] = $request->boolean('status');

        Tenant::create($validated);

        return redirect()
            ->route('admin.tenants.index')
            ->with('success', 'Tenant / Brand created successfully.');
    }

    public function edit(Tenant $tenant)
    {
        return view(
            'admin.tenants.edit',
            compact('tenant')
        );
    }

    public function update(
        UpdateTenantRequest $request,
        Tenant $tenant
    ) {
        $validated = $request->validated();

        if ($request->hasFile('logo')) {

            if (
                $tenant->logo &&
                Storage::exists($tenant->logo)
            ) {
                Storage::delete($tenant->logo);
            }

            $validated['logo'] = $request
                ->file('logo')
                ->store('tenants/logos');
        }

        $validated['status'] = $request->boolean('status');

        $tenant->update($validated);

        return redirect()
            ->route('admin.tenants.index')
            ->with('success', 'Tenant / Brand updated successfully.');
    }

    public function destroy(Tenant $tenant)
    {
        if (
            $tenant->logo &&
            Storage::exists($tenant->logo)
        ) {
            Storage::delete($tenant->logo);
        }

        $tenant->delete();

        return redirect()
            ->route('admin.tenants.index')
            ->with('success', 'Tenant / Brand deleted successfully.');
    }
}