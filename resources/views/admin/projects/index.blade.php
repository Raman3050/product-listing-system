@extends('layouts.admin')

@section('title', 'Project')

@section('content')



<div class="card shadow-sm">

    <div class="card-body">

        <form method="GET" action="{{ route('admin.projects.index') }}">

            <div class="row mb-4">

                {{-- Search --}}
                <div class="col-md-3">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search Project..."
                        value="{{ request('search') }}">
                </div>

                {{-- Builder --}}
                <div class="col-md-2">
                    <select name="builder_id" class="form-select">
                        <option value="">Builder</option>

                        @foreach($builders as $builder)
                            <option
                                value="{{ $builder->id }}"
                                @selected(request('builder_id') == $builder->id)>
                                {{ $builder->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- Category --}}
                <div class="col-md-2">
                    <select
                        name="property_category_id"
                        class="form-select">

                        <option value="">Category</option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                @selected(request('property_category_id') == $category->id)>

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>
                </div>

                {{-- Location --}}
                <div class="col-md-2">
                    <select
                        name="location_id"
                        class="form-select">

                        <option value="">Location</option>

                        @foreach($locations as $location)

                            <option
                                value="{{ $location->id }}"
                                @selected(request('location_id') == $location->id)>

                                {{ $location->name }}

                            </option>

                        @endforeach

                    </select>
                </div>

                {{-- Search Button --}}
                <div class="col-md-2 d-grid">

                    <button class="btn btn-primary">

                        Search

                    </button>

                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-2">

                    <select
                        name="per_page"
                        class="form-select"
                        onchange="this.form.submit()">

                        <option value="10" @selected(request('per_page',10)==10)>
                            10 Records
                        </option>

                        <option value="25" @selected(request('per_page')==25)>
                            25 Records
                        </option>

                        <option value="50" @selected(request('per_page')==50)>
                            50 Records
                        </option>

                        <option value="100" @selected(request('per_page')==100)>
                            100 Records
                        </option>

                    </select>

                </div>

                <div class="col-md-10 text-end">

                    <a
                        href="{{ route('admin.projects.create') }}"
                        class="btn btn-success">

                        Add Project

                    </a>

                </div>

            </div>

        </form>

        <div class="table-responsive">

        <table class="table table-bordered table-hover align-middle">

            <thead>

                <tr>

                    <th width="80">ID</th>

                    <th>Project Name</th>

                    <th width="120">Status</th>

                    <th width="150">Action</th>

                </tr>

            </thead>

            <tbody>

            @forelse($projects as $project)

                <tr>

                    <td>{{ $project->id }}</td>

                    <td>{{ $project->name }}</td>

                    <td>

                        @if($project->status)

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

                        <a
                            href="{{ route('admin.projects.edit',$project) }}"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form
                            action="{{ route('admin.projects.destroy',$project) }}"
                            method="POST"
                            class="d-inline">

                            @csrf

                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this project?')">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="4"
                        class="text-center">

                        No Projects Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        </div>

        {{ $projects->links() }}

        <div class="d-flex justify-content-between align-items-center mt-3">

            <div>

                Showing

                {{ $projects->firstItem() ?? 0 }}

                to

                {{ $projects->lastItem() ?? 0 }}

                of

                {{ $projects->total() }}

                entries

            </div>

            <div>

                {{ $projects->appends(request()->all())->links() }}

            </div>

        </div>

    </div>

</div>

@endsection