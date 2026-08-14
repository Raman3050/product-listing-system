@extends('layouts.admin')

@section('title', 'Edit Project Page Details')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header">
            <h4 class="mb-0">
                Edit Project Page Details
            </h4>
        </div>

        <div class="card-body">

            <form
                action="{{ route('admin.project-page-details.update', $projectPageDetail) }}"
                method="POST">

                @csrf

                @method('PUT')

                @include('admin.project-page-details._form')

            </form>

        </div>

    </div>

</div>

@endsection