@extends('layouts.admin')

@section('title', 'Unit Feature')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2>Unit Features</h2>

        <p class="text-muted mb-0">

            Manage unit-features.

        </p>

    </div>

    <a href="{{ route('admin.unit-features.create') }}"
       class="btn btn-primary">

        <i class="bi bi-plus-lg"></i>

        Add Unit Feature

    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <div class="card shadow-sm mb-3">

            <div class="card-body">

                <form method="GET">

                    <div class="row align-items-end">

                        <div class="col-md-4">

                            <label class="form-label">
                                Search
                            </label>

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Search Unit Feature..."
                                value="{{ request('search') }}">

                        </div>

                        <div class="col-md-2">

                            <label class="form-label">
                                Records Per Page
                            </label>

                            <select
                                name="per_page"
                                class="form-select">

                                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>

                                <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>

                                <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>

                                <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>

                            </select>

                        </div>

                        <div class="col-md-2">

                            <button class="btn btn-primary w-100">

                                Search

                            </button>

                        </div>

                        <div class="col-md-2">

                            <a
                                href="{{ route('admin.unit-features.index') }}"
                                class="btn btn-secondary w-100">

                                Reset

                            </a>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Name</th>

                    <th>Status</th>

                    <th width="180">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($unitFeatures as $unitFeature)

                    <tr>

                        <td>{{ $unitFeatures->firstItem() + $loop->index }}</td>

                        <td>{{ $unitFeature->name }}</td>

                        <td>

                            @if($unitFeature->status)

                                <span class="badge bg-success">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Inactive

                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a href="{{ route('admin.unit-features.edit', $unitFeature) }}"
                                class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil"></i>

                                    Edit

                                </a>

                                <form
                                    action="{{ route('admin.unit-features.destroy', $unitFeature) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this Unit Feature?')">

                                        <i class="bi bi-trash"></i>

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                            class="text-center">

                            No Unit Features Found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="d-flex justify-content-between align-items-center mt-3">

            <div>

                Showing

                {{ $unitFeatures->firstItem() ?? 0 }}

                to

                {{ $unitFeatures->lastItem() ?? 0 }}

                of

                {{ $unitFeatures->total() }}

                entries

            </div>

            <div>

                {{ $unitFeatures->appends(request()->all())->links() }}

            </div>

        </div>

    </div>

</div>

@endsection