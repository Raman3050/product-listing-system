@extends('layouts.admin')

@section('title', 'Edit Location')

@section('content')

<div class="mb-4">

    <h2>Edit Location</h2>

    <p class="text-muted">

        Update Location details.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.locations.update', $location) }}">

    @csrf
    @method('PUT')

    @include('admin.locations._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Update Location

        </button>

        <a href="{{ route('admin.locations.index') }}"
           class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection