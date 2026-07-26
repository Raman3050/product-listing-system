<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $search = request('search');

        $perPage = request('per_page', 10);

        $categories = Category::query()

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('slug', 'LIKE', "%{$search}%");

        });

    })

    ->latest()

    ->paginate($perPage);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,

            'slug' => SlugHelper::generate(
                Category::class,
                $request->name
            ),

            'description' => $request->description,

            'status' => $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name'        => $request->name,
            'slug'        => $request->slug,
            'description' => $request->description,
            'status'      => $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
                ->route('admin.categories.index')
                ->with('success','Category deleted successfully.');
    }
}