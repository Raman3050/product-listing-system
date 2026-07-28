@extends('layouts.admin')

@section('title', 'Add Project')

@section('content')

<div class="mb-4">

    <h2>Add Project</h2>

    <p class="text-muted">

        Create a new Project.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.projects.store') }}"
    enctype="multipart/form-data">

    @csrf

    @include('admin.projects._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Save Project

        </button>

        <a
            href="{{ route('admin.projects.index') }}"
            class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection