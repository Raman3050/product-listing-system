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
                value="{{ old('name', $location->name ?? '') }}">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">
                Slug
            </label>

            <input
                type="text"
                name="slug"
                class="form-control @error('slug') is-invalid @enderror"
                value="{{ old('slug', $location->slug ?? '') }}">

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
                class="form-control @error('description') is-invalid @enderror">{{ old('description', $location->description ?? '') }}</textarea>

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
                {{ old('status', $location->status ?? true) ? 'checked' : '' }}>

            <label class="form-check-label">

                Active

            </label>

        </div>

    </div>

</div>