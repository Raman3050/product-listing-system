@extends('layouts.admin')

@section('title', 'Add Property Category')

@section('content')

<div class="mb-4">

    <h2>Add Property Category</h2>

    <p class="text-muted">

        Create a new property category.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.property-categories.store') }}">

    @csrf

    @include('admin.property-categories._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Save Property Category

        </button>

        <a
            href="{{ route('admin.property-categories.index') }}"
            class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection