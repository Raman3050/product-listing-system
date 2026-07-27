@extends('layouts.admin')

@section('title', 'Add Builder')

@section('content')

<div class="mb-4">

    <h2>Add Builder</h2>

    <p class="text-muted">

        Create a new Builder.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.builders.store') }}"
    enctype="multipart/form-data">

    @csrf

    @include('admin.builders._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Save Builder

        </button>

        <a
            href="{{ route('admin.builders.index') }}"
            class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection