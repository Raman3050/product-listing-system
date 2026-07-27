@extends('layouts.admin')

@section('title', 'Edit Amenity')

@section('content')

<div class="mb-4">

    <h2>Edit Amenity</h2>

    <p class="text-muted">

        Update Amenity details.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.amenities.update', $amenity) }}">

    @csrf
    @method('PUT')

    @include('admin.amenities._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Update Amenity

        </button>

        <a href="{{ route('admin.amenities.index') }}"
           class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection