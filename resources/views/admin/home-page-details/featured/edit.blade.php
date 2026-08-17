@extends('layouts.admin')

@section('title', 'Edit Featured Property')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Edit Featured Property</h4>
                <a href="{{ route('admin.home-page-featured.index') }}" class="btn btn-secondary">
                    Back to List
                </a>
            </div>

            <form method="POST" action="{{ route('admin.home-page-featured.update', $homePageFeatured) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.home-page-details.featured._form', ['featured' => $homePageFeatured])
            </form>

        </div>

    </div>

</div>

@endsection
