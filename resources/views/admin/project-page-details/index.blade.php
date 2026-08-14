@extends('layouts.admin')

@section('title', 'Project Page Details')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-header">

            <h4 class="mb-0">
                Project Page Details
            </h4>

        </div>

        <div class="card-body">

            {{-- Filters --}}
            <form
                method="GET"
                action="{{ route('admin.project-page-details.index') }}">

                <div class="row mb-4">

                    {{-- Search --}}
                    <div class="col-md-4">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search by Project Name..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-3">

                        <button
                            class="btn btn-primary">

                            Search

                        </button>

                        <a
                            href="{{ route('admin.project-page-details.index') }}"
                            class="btn btn-secondary">

                            Reset

                        </a>

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
                            href="{{ route('admin.project-page-details.create') }}"
                            class="btn btn-success">

                            Add Project Page Detail

                        </a>

                    </div>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="70">ID</th>

                            <th>Project</th>

                            <th>Project Name Override</th>

                            <th>First Heading</th>

                            <th>Second Heading</th>

                            <th width="150">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($projectPageDetails as $detail)

                        <tr>

                            <td>
                                {{ $detail->id }}
                            </td>

                            <td>
                                {{ $detail->project->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $detail->project_name ?? '-' }}
                            </td>

                            <td>
                                {{ $detail->first_yellow_heading ?? '-' }}
                            </td>
                            
                            <td>
                                {{ $detail->second_yellow_heading ?? '-' }}
                            </td>

                            <td>

                                <a
                                    href="{{ route('admin.project-page-details.edit',$detail) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('admin.project-page-details.destroy',$detail) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this project page detail?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center">

                                No Project Page Details Found.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            {{ $projectPageDetails->links() }}

        </div>

    </div>

</div>

@endsection
