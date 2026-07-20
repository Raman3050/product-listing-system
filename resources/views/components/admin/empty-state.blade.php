@props([
    'title',
    'message'
])

<div class="text-center py-5">

    <i class="bi bi-inbox fs-1 text-secondary"></i>

    <h5 class="mt-3">

        {{ $title }}

    </h5>

    <p class="text-muted">

        {{ $message }}

    </p>

</div>