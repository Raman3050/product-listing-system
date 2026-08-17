@extends('layouts.admin')

@section('title', 'Add Featured Property')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Add Featured Property</h4>
                <a href="{{ route('admin.home-page-featured.index') }}" class="btn btn-secondary">
                    Back to List
                </a>
            </div>

            <form method="POST" action="{{ route('admin.home-page-featured.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.home-page-details.featured._form')
            </form>

        </div>

    </div>

</div>

@endsection
