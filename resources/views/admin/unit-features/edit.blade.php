@extends('layouts.admin')

@section('title', 'Edit Unit Feature')

@section('content')

<div class="mb-4">

    <h2>Edit Unit Feature</h2>

    <p class="text-muted">

        Update Unit Feature details.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.unit-features.update', $unitFeature) }}">

    @csrf
    @method('PUT')

    @include('admin.unit-features._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Update Unit Feature

        </button>

        <a href="{{ route('admin.unit-features.index') }}"
           class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection