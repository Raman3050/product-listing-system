@extends('layouts.admin')

@section('title', 'Create Unit')

@section('content')

<div class="container-fluid">

    <form
        action="{{ route('admin.units.store') }}"
        method="POST">

        @csrf

        @include('admin.units._form')

    </form>

</div>

@endsection