@extends('layouts.admin')

@section('title', 'Unit Images')

@section('content')

    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card mb-4">

            <div class="card-header">
                <h5>Select Unit</h5>
            </div>

            <div class="card-body">

                <form method="GET">

                    <div class="row">

                        <div class="col-md-6">

                            <select name="unit_id" class="form-select">

                                <option value="">
                                    Select Unit
                                </option>

                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}" @selected(request('unit_id') == $unit->id)>

                                        {{ $unit->name }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-2">

                            <button class="btn btn-primary">

                                Load Images

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        @if ($selectedUnit)
            <div class="card mb-4">

                <div class="card-header">

                    <h5>

                        Upload Images

                    </h5>

                </div>

                <div class="card-body">

                    <form action="{{ route('admin.unit-images.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="unit_id" value="{{ $selectedUnit->id }}">

                        <div class="mb-3">

                            <input type="file" name="images[]" class="form-control" multiple>

                        </div>

                        <button class="btn btn-success">

                            Upload Images

                        </button>

                    </form>

                </div>

            </div>
        @endif

        @if ($selectedUnit)

            <div class="row">

                @forelse($images as $image)
                    <div class="col-md-3 mb-4">

                        <div class="card">

                            <img src="{{ Storage::url($image->image) }}" class="card-img-top"
                                style="height:200px;object-fit:cover;">

                            <div class="card-body">

                                <p>

                                    Sort Order :

                                    {{ $image->sort_order }}

                                </p>

                                <form action="{{ route('admin.unit-images.destroy', $image) }}" method="POST">

                                    @csrf

                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm w-100" onclick="return confirm('Delete image?')">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-info">

                            No Images Uploaded.

                        </div>

                    </div>
                @endforelse

            </div>

        @endif

    </div>

@endsection
