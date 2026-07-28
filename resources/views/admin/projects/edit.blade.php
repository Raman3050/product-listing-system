@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')

<div class="mb-4">

    <h2>Edit Project</h2>

    <p class="text-muted">

        Update Project details.

    </p>

</div>

<form
    method="POST"
    enctype="multipart/form-data"
    action="{{ route('admin.projects.update', $project) }}">

    @csrf
    @method('PUT')

    @include('admin.projects._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Update Project

        </button>

        <a href="{{ route('admin.projects.index') }}"
           class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection