@extends('layouts.admin')

@section('title', 'Project Images')

@section('content')

    <div class="card shadow-sm mb-4">

        <div class="card-header">

            <h5 class="mb-0">Project Images</h5>

        </div>

        <div class="card-body">

            <form method="GET">

                <div class="row align-items-end">

                    <div class="col-md-10">

                        <label class="form-label">

                            Select Project

                        </label>

                        <select name="project_id" class="form-select">

                            <option value="">

                                Select Project

                            </option>

                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" @selected(request('project_id') == $project->id)>

                                    {{ $project->name }}

                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-2 d-grid">

                        <button class="btn btn-primary">

                            Load

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    @if ($selectedProject)

        <div class="card shadow-sm">

            <div class="card-header">

                <h5 class="mb-0">

                    {{ $selectedProject->name }}

                </h5>

            </div>

            <div class="card-body">

                <form action="{{ route('admin.project-images.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="project_id" value="{{ $selectedProject->id }}">

                    <div class="row">

                        <div class="col-md-10">

                            <input type="file" name="images[]" multiple
                                class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror">

                            @error('images')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('images.*')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="col-md-2 d-grid">

                            <button class="btn btn-success">

                                Upload

                            </button>

                        </div>

                    </div>

                </form>

                <hr>

                <div class="row">

                    @forelse($projectImages as $image)
                        <div class="col-md-3 mb-4">

                            <div class="card">

                                <img src="{{ Storage::disk('r2')->url($image->image) }}" class="card-img-top"
                                    style="height:220px; object-fit:cover;">

                                <div class="card-body text-center">

                                    <form action="{{ route('admin.project-images.destroy', $image) }}" method="POST">

                                        @csrf

                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete image?')">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12">

                            <div class="alert alert-info">

                                No images uploaded.

                            </div>

                        </div>
                    @endforelse

                </div>

            </div>

    @endif
@endsection
