<div class="card shadow-sm">

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">
                Name
            </label>

            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $amenity->name ?? '') }}">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">

                Icon

            </label>

            <input
                type="text"
                name="icon"
                class="form-control @error('icon') is-invalid @enderror"
                value="{{ old('icon', $amenity->icon ?? '') }}"
                placeholder="e.g. water">

            <div class="mt-2">
                <i id="icon-preview" class="bi fs-3"></i>
            </div>

            @error('icon')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

            <small class="text-muted">

                Enter the Bootstrap Icon name only (e.g. water, wifi, lightning, building).

            </small>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Slug
            </label>

            <input
                type="text"
                name="slug"
                class="form-control @error('slug') is-invalid @enderror"
                value="{{ old('slug', $amenity->slug ?? '') }}">

            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <small class="text-muted">
                Leave blank while creating. It will be generated automatically.
            </small>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                rows="4"
                name="description"
                class="form-control @error('description') is-invalid @enderror">{{ old('description', $amenity->description ?? '') }}</textarea>

            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="form-check mb-4">

            <input
                class="form-check-input"
                type="checkbox"
                name="status"
                value="1"
                {{ old('status', $amenity->status ?? true) ? 'checked' : '' }}>

            <label class="form-check-label">

                Active

            </label>

        </div>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const input = document.querySelector('input[name="icon"]');
    const preview = document.getElementById('icon-preview');

    function updateIcon() {
        preview.className = 'bi bi-' + input.value + ' fs-3';
    }

    updateIcon();

    input.addEventListener('input', updateIcon);

});
</script>