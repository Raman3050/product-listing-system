@extends('layouts.admin')

@section('title', 'Project Logos')

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
            <h4 class="mb-0">Select Builders for Home Page Logos</h4>
        </div>
        
        <div class="card-body">
            <form action="{{ route('admin.home-page-logos.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    @forelse($builders as $builder)
                        <div class="col-md-4 col-lg-3 mb-3">
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="builders[]"
                                    value="{{ $builder->id }}"
                                    id="builder{{ $builder->id }}"
                                    @checked(in_array($builder->id, $selectedBuilderIds))>
                                <label class="form-check-label d-flex align-items-center" for="builder{{ $builder->id }}">
                                    @if($builder->logo)
                                        <img src="{{ Storage::disk('public')->url($builder->logo) }}" alt="logo" style="width: 50px; height: 50px; object-fit: contain;" class="me-2 rounded border bg-white p-1">
                                    @endif
                                    {{ $builder->name }}
                                </label>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info mb-0">No active builders available.</div>
                        </div>
                    @endforelse
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">Save Logos</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
