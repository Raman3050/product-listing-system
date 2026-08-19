@extends('layouts.admin')

@section('title', 'Featured Properties')

@section('content')

<div class="container-fluid">

    @include('admin.home-page-details._tabs')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-header">
            <h4 class="mb-0">Featured Properties</h4>
        </div>

        <div class="card-body">

            <form method="GET" action="{{ route('admin.home-page-featured.index') }}">

                <div class="row mb-3">
                    <div class="col-md-2">
                        <select name="per_page" class="form-select" onchange="this.form.submit()">
                            <option value="10" @selected(request('per_page', 10) == 10)>10 Records</option>
                            <option value="25" @selected(request('per_page') == 25)>25 Records</option>
                            <option value="50" @selected(request('per_page') == 50)>50 Records</option>
                        </select>
                    </div>

                    <div class="col-md-10 text-end">
                        <a href="{{ route('admin.home-page-featured.create') }}" class="btn btn-success">
                            Add Featured Property
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
                            <th width="100">Sort Order</th>
                            <th width="100">Status</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($featured as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->project->name ?? 'N/A' }}</td>
                            <td>{{ $item->sort_order }}</td>
                            <td>
                                @if($item->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.home-page-featured.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.home-page-featured.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this featured property?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Featured Properties Found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{ $featured->links() }}

        </div>
    </div>
</div>

@endsection
