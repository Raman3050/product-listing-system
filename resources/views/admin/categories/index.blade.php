@extends('layouts.admin')

@section('title', 'Categories')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="mb-0">Categories</h2>
        <small class="text-muted">
            Manage product categories
        </small>
    </div>

    <a href="{{ route('admin.categories.create') }}"
       class="btn btn-primary">

        <i class="bi bi-plus-lg"></i>

        Add Category

    </a>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-body">

        <form method="GET" action="{{ route('admin.categories.index') }}">

            <div class="row g-2 align-items-center">

    <div class="col-md-5">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search by category name or slug..."
            value="{{ request('search') }}">

    </div>

    <div class="col-md-2">

        <select name="per_page" class="form-select">

            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>
                10
            </option>

            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>
                25
            </option>

            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>
                50
            </option>

            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>
                100
            </option>

        </select>

    </div>

    <div class="col-auto">

        <button type="submit" class="btn btn-primary">
            Search
        </button>

    </div>

    <div class="col-auto">

        <a href="{{ route('admin.categories.index') }}"
           class="btn btn-secondary">

            Reset

        </a>

    </div>

</div>

        </form>

    </div>

</div>

<div class="card shadow-sm">
    <div class="card-body">

        @if($categories->isEmpty())

            <p class="text-muted mb-0">
                No categories found.
            </p>

        @else

            <table class="table table-hover">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th width="150">Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($categories as $category)

                        <tr>

                            <td>{{ $category->id }}</td>

                            <td>{{ $category->name }}</td>

                            <td>

                                @if($category->status)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td>
                                <div class="btn-group" role="group">

                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                    class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this category?')">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </div>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

            {{ $categories->appends(request()->query())->links() }}

        @endif

    </div>
</div>

@endsection