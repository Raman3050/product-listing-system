@extends('layouts.admin')

@section('title', 'Edit Property Unit Banner')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Edit Property Unit Banner</h4>
                <a href="{{ route('admin.home-page-banners.index') }}" class="btn btn-secondary">
                    Back to List
                </a>
            </div>

            <form method="POST" action="{{ route('admin.home-page-banners.update', $homePageBanner) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.home-page-details.banners._form', ['banner' => $homePageBanner])
            </form>

        </div>

    </div>

</div>

@endsection
